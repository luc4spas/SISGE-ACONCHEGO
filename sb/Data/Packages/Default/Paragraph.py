import sublime, sublimeplugin
import string
import textwrap
import re
import Comment


def previousLine(view, sr):
	"""sr should be a Region covering the entire hard line"""
	if sr.begin() == 0:
		return None
	else:
		return view.fullLine(sr.begin() - 1)

def nextLine(view, sr):
	"""sr should be a Region covering the entire hard line, including
	the newline"""
	if sr.end() == view.size():
		return None
	else:
		return view.fullLine(sr.end())


separatingLinePattern = re.compile("^[\\t ]*\\n?$")

def isParagraphSeparatingLine(view, sr):
	return separatingLinePattern.match(view.substr(sr)) != None

def hasPrefix(view, line, prefix):
	if not prefix:
		return True

	lineStart = view.substr(sublime.Region(line.begin(),
		line.begin() + len(prefix)))

	return lineStart == prefix

def expandToParagraph(view, tp):
	sr = view.fullLine(tp)
	if isParagraphSeparatingLine(view, sr):
		return sublime.Region(tp, tp)

	requiredPrefix = None

	# If the current line starts with a comment, only select lines that are also
	# commented
	(lineComments, blockComments) = Comment.buildCommentData(view, tp)
	dataStart = Comment.advanceToFirstNonWhitespaceOnLine(view, sr.begin())
	for c in lineComments:
		(start, disableIndent) = c
		commentRegion = sublime.Region(dataStart,
			dataStart + len(start))
		if view.substr(commentRegion) == start:
			requiredPrefix = view.substr(sublime.Region(sr.begin(), commentRegion.end()))
			break

	print "requiring prefix", requiredPrefix

	first = sr.begin()
	prev = sr
	while True:
		prev = previousLine(view, prev)
		if (prev == None or isParagraphSeparatingLine(view, prev) or
				not hasPrefix(view, prev, requiredPrefix)):
			break
		else:
			first = prev.begin()

	last = sr.end()
	next = sr
	while True:
		next = nextLine(view, next)
		if (next == None or isParagraphSeparatingLine(view, next) or
				not hasPrefix(view, next, requiredPrefix)):
			break
		else:
			last = next.end()

	return sublime.Region(first, last)

def allParagraphsIntersectingSelection(view, sr):
	paragraphs = []

	para = expandToParagraph(view, sr.begin())
	if not para.empty():
		paragraphs.append(para)

	while True:
		line = nextLine(view, para)
		if line == None or line.begin() >= sr.end():
			break;

		if not isParagraphSeparatingLine(view, line):
			para = expandToParagraph(view, line.begin())
			paragraphs.append(para)
		else:
			para = line

	return paragraphs


class ExpandSelectionToParagraphCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		regions = []

		for s in view.sel():
			regions.append(sublime.Region(
				expandToParagraph(view, s.begin()).begin(),
				expandToParagraph(view, s.end()).end()))

		for r in regions:
			view.sel().add(r)


class WrapLinesCommand(sublimeplugin.TextCommand):
	linePrefixPattern = re.compile("^\W+")

	def extractPrefix(self, view, sr):
		lines = view.splitByNewlines(sr)
		if len(lines) == 0:
			return None

		initialPrefixMatch = self.linePrefixPattern.match(view.substr(
			lines[0]))
		if not initialPrefixMatch:
			return None

		prefix = view.substr(sublime.Region(lines[0].begin(),
			lines[0].begin() + initialPrefixMatch.end()))

		for line in lines[1:]:
			if view.substr(sublime.Region(line.begin(),
					line.begin() + len(prefix))) != prefix:
				return None

		return prefix

	def widthInSpaces(self, str, tabWidth):
		sum = 0;
		for c in str:
			if c == '\t':
				sum += tabWidth
			else:
				sum += 1
		return sum


	def run(self, view, args):
		width = 70
		if len(args) > 0:
			# Width has been given as an argument
			try:
				width = int(args[0])
			except ValueError:
				pass
		elif view.options().getString("rulers"):
			# try and guess the wrap width from the ruler, if any
			try:
				width = int(view.options().getString("rulers"))
			except ValueError:
				pass

		if width == 0:
			width = 70

		# Make sure tabs are handled as per the current buffer
		tabWidth = 8
		if view.options().getString("tabSize"):
			try:
				tabWidth = int(view.options().getString("tabSize"))
			except ValueError:
				pass

		if tabWidth == 0:
			tabWidth == 8

		paragraphs = []
		for s in view.sel():
			paragraphs.extend(allParagraphsIntersectingSelection(view, s))


		if len(paragraphs) > 0:
			view.sel().clear()
			for p in paragraphs:
				view.sel().add(p)

			# This isn't an ideal way to do it, as we loose the position of the
			# cursor within the paragraph: hence why the paragraph is selected
			# at the end.
			for s in view.sel():
				wrapper = textwrap.TextWrapper()
				wrapper.expand_tabs = False
				wrapper.width = width
				prefix = self.extractPrefix(view, s)
				if prefix:
					wrapper.initial_indent = prefix
					wrapper.subsequent_indent = prefix
					wrapper.width -= self.widthInSpaces(prefix, tabWidth)

				if wrapper.width < 0:
					continue

				txt = view.substr(s)
				if prefix:
					txt = txt.replace(prefix, u"")

				txt = string.expandtabs(txt, tabWidth)

				txt = wrapper.fill(txt) + u"\n"
				view.replace(s, txt)

			# It's unhelpful to have the entire paragraph selected, just leave the
			# selection at the end
			ends = [s.end() - 1 for s in view.sel()]
			view.sel().clear()
			for pt in ends:
				view.sel().add(sublime.Region(pt))
