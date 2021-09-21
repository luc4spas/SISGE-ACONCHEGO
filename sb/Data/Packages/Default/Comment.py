import sublime, sublimeplugin


def advanceToFirstNonWhitespaceOnLine(view, pt):
	while True:
		c = view.substr(sublime.Region(pt, pt + 1))
		if c == " " or c == "\t":
			pt += 1
		else:
			break

	return pt

def hasNonWhitespaceOnLine(view, pt):
	while True:
		c = view.substr(sublime.Region(pt, pt + 1))
		if c == " " or c == "\t":
			pt += 1
		else:
			return c != "\n"

def buildCommentData(view, pt):
	shellVars = view.metaInfo("shellVariables", pt)
	if not shellVars:
		return ([], [])

	# transform the list of dicts into a single dict
	allVars = {}
	for v in shellVars:
		if 'name' in v and 'value' in v:
			allVars[v['name']] = v['value']

	lineComments = []
	blockComments = []

	# transform the dict into a single array of valid comments
	suffixes = [""] + ["_" + str(i) for i in xrange(1, 10)]
	for suffix in suffixes:
		start = allVars.setdefault("TM_COMMENT_START" + suffix)
		end = allVars.setdefault("TM_COMMENT_END" + suffix)
		mode = allVars.setdefault("TM_COMMENT_MODE" + suffix)
		disableIndent = allVars.setdefault("TM_COMMENT_DISABLE_INDENT" + suffix)

		if start and end:
			blockComments.append((start, end, disableIndent == 'yes'))
			blockComments.append((start.strip(), end.strip(), disableIndent == 'yes'))
		elif start:
			lineComments.append((start, disableIndent == 'yes'))
			lineComments.append((start.strip(), disableIndent == 'yes'))

	return (lineComments, blockComments)

class ToggleCommentCommand(sublimeplugin.TextCommand):

	def removeBlockComment(self, view, commentData, region):
		(lineComments, blockComments) = commentData

		wholeRegion = view.extractScope(region.begin())

		for c in blockComments:
			(start, end, disableIndent) = c
			startRegion = sublime.Region(wholeRegion.begin(),
				wholeRegion.begin() + len(start))
			endRegion = sublime.Region(wholeRegion.end() - len(end),
				wholeRegion.end())

			if view.substr(startRegion) == start and view.substr(endRegion) == end:
				# It's faster to erase the start region first
				view.erase(startRegion)

				endRegion = sublime.Region(
					endRegion.begin() - startRegion.size(),
					endRegion.end() - startRegion.size())

				view.erase(endRegion)
				return True

		return False

	def removeLineComment(self, view, commentData, region):
		(lineComments, blockComments) = commentData

		foundLineComment = False

		startPositions = [advanceToFirstNonWhitespaceOnLine(view, r.begin())
			for r in view.lines(region)]

		startPositions.reverse()

		for pos in startPositions:
			for c in lineComments:
				(start, disableIndent) = c
				commentRegion = sublime.Region(pos,
					pos + len(start))
				if view.substr(commentRegion) == start:
					view.erase(commentRegion)
					foundLineComment = True
					break

		return foundLineComment
		
	def isEntirelyLineCommented(self, view, commentData, region):
		(lineComments, blockComments) = commentData

		startPositions = [advanceToFirstNonWhitespaceOnLine(view, r.begin())
			for r in view.lines(region)]
			
		startPositions = filter(lambda p: hasNonWhitespaceOnLine(view, p),
			startPositions)

		if len(startPositions) == 0:
			return False

		for pos in startPositions:
			foundLineComment = False
			for c in lineComments:
				(start, disableIndent) = c
				commentRegion = sublime.Region(pos,
					pos + len(start))
				if view.substr(commentRegion) == start:
					foundLineComment = True
			if not foundLineComment:
				return False

		return True

	def blockCommentRegion(self, view, blockCommentData, region):
		(start, end, disableIndent) = blockCommentData
		view.insert(region.end(), end)
		view.insert(region.begin(), start)

	def lineCommentRegion(self, view, lineCommentData, region):
		(start, disableIndent) = lineCommentData

		startPositions = [r.begin() for r in view.lines(region)]
		startPositions.reverse()

		# Remove any blank lines from consideration, they make getting the
		# comment start markers to line up challenging
		nonEmptyStartPositions = filter(lambda p: hasNonWhitespaceOnLine(view, p),
			startPositions)

		# If all the lines are blank however, just comment away
		if len(nonEmptyStartPositions) != 0:
			startPositions = nonEmptyStartPositions

		if not disableIndent:
			minIndent = None

			# This won't work well with mixed spaces and tabs, but really,
			# don't do that!
			for pos in startPositions:
				indent = advanceToFirstNonWhitespaceOnLine(view, pos) - pos
				if minIndent == None or indent < minIndent:
					minIndent = indent

			if minIndent != None and minIndent > 0:
				startPositions = [r + minIndent for r in startPositions]

		for pos in startPositions:
			view.insert(pos, start)

	def addComment(self, view, commentData, preferBlock, region):
		(lineComments, blockComments) = commentData
		
		if len(lineComments) == 0 and len(blockComments) == 0:
			return

		if len(blockComments) == 0:
			preferBlock = False

		if len(lineComments) == 0:
			preferBlock = True

		if region.empty():
			if len(lineComments) == 0:
				# add the block comment
				self.blockCommentRegion(view, blockComments[0], region)
			else:
				# comment out the line
				self.lineCommentRegion(view, lineComments[0], region)
		else:
			if preferBlock:
				# add the block comment
				self.blockCommentRegion(view, blockComments[0], region)
			else:
				# add a line comment to each line
				self.lineCommentRegion(view, lineComments[0], region)

	def run(self, view, args):
		preferBlock = False
		if len(args) > 0 and args[0] == "block":
			preferBlock = True
			
		for region in view.sel():
			commentData = buildCommentData(view, region.begin())
			if (region.end() != view.size() and
					buildCommentData(view, region.end()) != commentData):
				# region spans languages, nothing we can do
				continue
			
			if self.removeBlockComment(view, commentData, region):
				continue

			if self.isEntirelyLineCommented(view, commentData, region):
				self.removeLineComment(view, commentData, region)
				continue
				
			# Add a comment instead
			self.addComment(view, commentData, preferBlock, region)
