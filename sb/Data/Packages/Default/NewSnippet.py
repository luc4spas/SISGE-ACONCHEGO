import sublime, sublimeplugin
import os

class NewSnippetCommand(sublimeplugin.WindowCommand):
	def run(self, window, args):

		view = window.newFile()
		
		path = sublime.packagesPath() + u"/user"
		
		try:
			os.chdir(path)
		except Exception:
			pass
		
		view.options().set("syntax", "Packages/XML/XML.tmLanguage")
		view.options().set("forcedExtension", "sublime-snippet")
		
		prefix = """<!-- See http://www.sublimetext.com/docs/snippets for more information -->
<snippet>
	<content><![CDATA["""

		contents = "Type your snippet here"

		suffix = """]]></content>
	<!-- Optional: Tab trigger to activate the snippet -->
	<tabTrigger>xyzzy</tabTrigger>
	<!-- Optional: Scope the tab trigger will be active in -->
	<scope>source.python</scope>
	<!-- Optional: Description to show in the menu -->	
	<description>My Fancy Snippet</description>
</snippet>
"""
		
		start = view.insert(0, prefix)
		end = start + view.insert(view.size(), contents)
		view.insert(view.size(), suffix)
		
		view.sel().clear()
		view.sel().add(sublime.Region(start, end))
