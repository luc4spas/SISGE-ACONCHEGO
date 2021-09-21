import sublime, sublimeplugin


class DeleteWordCommand(sublimeplugin.TextCommand):
	def clamp(self, xmin, x, xmax):
		if x < xmin:
			return xmin
		if x > xmax:
			return xmax
		return x;

	def expandWord(self, view, pos, forward):
		if forward:
			delta = 1
			endPosition = view.line(pos).b
		else:
			delta = -1
			endPosition = view.line(pos).a

		txt = view.substr(sublime.Region(pos, endPosition))
		if not forward:
			txt = txt[::-1]

		if len(txt) == 0:
			return sublime.Region(pos, pos + delta)

		sepChars = view.options().get("wordSeparators") + " \t"
		inWord = sepChars.find(txt[0]) == -1

		count = 1

		for i in xrange(1, len(txt)):
			thisInWord = sepChars.find(txt[i]) == -1
			if thisInWord == inWord:
				count = count + 1
			else:
				break

		return sublime.Region(pos, pos + delta * count)


	def run(self, view, args):
		forward = True
		if len(args) > 0 and args[0] == "left":
			forward = False

		newSels = []

		for s in reversed(view.sel()):
			if s.empty():
				newSels.append(self.expandWord(view, s.b, forward))

		sz = view.size()
		for s in newSels:
			view.sel().add(sublime.Region(self.clamp(0, s.a, sz),
				self.clamp(0, s.b, sz)))

		if forward:
			view.runCommand('rightDeleteCharacters')
		else:
			view.runCommand('leftDeleteCharacters')
