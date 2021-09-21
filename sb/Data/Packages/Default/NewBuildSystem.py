import sublime, sublimeplugin
import os
import functools

class NewBuildSystemCommand(sublimeplugin.WindowCommand):
	def run(self, window, args):

		view = window.newFile()

		path = sublime.packagesPath() + u"/user"

		try:
			os.chdir(path)
		except Exception:
			pass

		view.options().set("syntax", "Packages/Default/Sublime Options.tmLanguage")
		view.options().set("forcedExtension", "sublime-build")

		template = """# See http://www.sublimetext.com/docs/build for details
build make
lineNumberRegex ^(...*?):([0-9]*):?([0-9]*)
showWhenFinished true
workingDir $ProjectDir
"""

		view.insert(0, template)
