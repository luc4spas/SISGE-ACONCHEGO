import sublime, sublimeplugin
import webbrowser


class OpenInBrowserCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		if view.fileName():
			webbrowser.open_new_tab("file://" + view.fileName())
		
	def isEnabled(self, view, args):
		return view.fileName() and (view.fileName()[-5:] == ".html" or
			view.fileName()[-4:] == ".htm")
