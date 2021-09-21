import sublime, sublimeplugin

class TrimTrailingWhiteSpace(sublimeplugin.Plugin):
	def onPreSave(self, view):
		if view.options().get("trimTrailingWhiteSpaceOnSave") == True:
			trailingWhitespace = view.findAll("[\t ]+$")
			trailingWhitespace.reverse()
			for r in trailingWhitespace:
				view.erase(r)
