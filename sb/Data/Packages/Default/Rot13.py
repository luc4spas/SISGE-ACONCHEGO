import sublime, sublimeplugin


class Rot13Command(sublimeplugin.TextCommand):
	def rot13Region(self, view, region):
		if not region.empty():
			s = view.substr(region)
			s = s.encode('rot13')
			view.replace(region, s)
		
	def run(self, view, args):
		if view.hasNonEmptySelectionRegion():
			for region in view.sel():
				self.rot13Region(view, region)
		else:
			self.rot13Region(view, sublime.Region(0, len(view)))
