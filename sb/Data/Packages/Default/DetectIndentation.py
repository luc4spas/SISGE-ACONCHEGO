import sublime, sublimeplugin
from functools import partial


class DetectIndentationCommand(sublimeplugin.TextCommand):
	"""Examines the contents of the buffer to determine the indentation
	settings."""

	def detectIndentation(self, view, threshold):
		sample = view.substr(sublime.Region(0, min(view.size(), 2**14)))

		startsWithTab = 0
		spacesList = []
		indentedLines = 0

		for line in sample.split("\n"):
			if not line: continue
			if line[0] == "\t":
				startsWithTab += 1
				indentedLines += 1
			elif line.startswith(' '):
				spaces = 0
				for ch in line:
					if ch == ' ': spaces += 1
					else: break
				if spaces > 1 and spaces != len(line):
					indentedLines += 1
					spacesList.append(spaces)

		if indentedLines >= threshold:
			if len(spacesList) > startsWithTab:
				for indent in xrange(8, 1, -1):
					sameIndent = filter(lambda x: x%indent == 0, spacesList)
					if len(sameIndent) >= 0.8 * len(spacesList):
						sublime.statusMessage("Detect Indentation: Setting indentation to "
							+ str(indent) + " spaces")
						view.options().set('translateTabsToSpaces', True)
						view.options().set('tabSize', indent)
						return

				for indent in xrange(8, 1, -2):
					sameIndent = filter(lambda x: x%indent == 0 or x%indent == 1, spacesList)
					if len(sameIndent) >= 0.8 * len(spacesList):
						sublime.statusMessage("Detect Indentation: Setting indentation to "
							+ str(indent) + " spaces")
						view.options().set('translateTabsToSpaces', True)
						view.options().set('tabSize', indent)
						return

			elif startsWithTab >= 0.8 * indentedLines:
				sublime.statusMessage("Detect Indentation: Setting indentation to tabs")
				view.options().set('translateTabsToSpaces', False)

	def onLoad(self, view):
		if view.options().get('detectIndentation'):
			self.detectIndentation(view, 10)

	def run(self, view, args):
		self.detectIndentation(view, 1)