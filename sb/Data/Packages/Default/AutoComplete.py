import sublime, sublimeplugin


class AutoCompleteCommand(sublimeplugin.TextCommand):

	# Entry point for other plugins to modify the completions. The keys for this
	# dictionary should be a string identifier unique to the completion callback
	completionCallbacks = {}

	def run(self, view, args):

		if len(view.sel()) == 0:
			return

		pos = view.sel()[0].b
		posw = view.word(pos)

		prefix = view.substr(posw)[0:(pos - posw.a)]

		completions = view.extractCompletions(prefix, pos)

		for c in AutoCompleteCommand.completionCallbacks.values():
			completions = c(view, pos, prefix, completions)

		if len(completions) == 0:
			sublime.statusMessage("No completion available")
		else:
			view.showCompletions(pos, prefix, completions)
