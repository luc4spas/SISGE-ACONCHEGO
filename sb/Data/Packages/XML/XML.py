import sublime, sublimeplugin
from xml.dom.minidom import parseString


class PrettyPrintXmlCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		sr = sublime.Region(0L, view.size())
		s = view.substr(sr)
	
		out = parseString(s).toprettyxml()
		# kill all the blank lines that get added
		out = u"\n".join([u for u in out.splitlines() if u.strip() != u""])
	
		view.replace(sr, out)
		
	def isEnabled(self, view, args):
		return (view.options().getString("syntax")
			== "Packages/XML/XML.tmLanguage")
