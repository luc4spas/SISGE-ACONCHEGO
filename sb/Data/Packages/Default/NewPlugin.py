import sublime, sublimeplugin
import os

class NewPluginCommand(sublimeplugin.WindowCommand):
	def run(self, window, args):

		view = window.newFile()
		
		path = sublime.packagesPath() + u"/user"
		
		try:
			os.chdir(path)
		except Exception:
			pass
		
		view.options().set("syntax", "Packages/Python/Python.tmLanguage")
		
		template = """import sublime, sublimeplugin

# This simple plugin will add 'Hello, World!' to the end of the buffer when run.
# To run it, save it within the User/ directory, then open the console (Ctrl+~),
# and type: view.runCommand('sample')
#
# See http://www.sublimetext.com/docs/plugin-basics for more information
class SampleCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		view.insert(view.size(), "Hello, World!\\n")
"""
		
		view.insert(0, template)
