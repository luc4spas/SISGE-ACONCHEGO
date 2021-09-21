import sublime, sublimeplugin
import string
import textwrap
import re
import functools


def transformSelectionText(f, v):
	for s in v.sel():
		if not s.empty():
			txt = f(v.substr(s))
			v.replace(s, txt)


class SwapCaseCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		transformSelectionText(string.swapcase, view)

	def isEnabled(self, view, args):
		return view.hasNonEmptySelectionRegion()


class UpperCaseCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		transformSelectionText(string.upper, view)

	def isEnabled(self, view, args):
		return view.hasNonEmptySelectionRegion()


class LowerCaseCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		transformSelectionText(string.lower, view)

	def isEnabled(self, view, args):
		return view.hasNonEmptySelectionRegion()

class TitleCaseCommand(sublimeplugin.TextCommand):
	def title(self, s):
		return string.capwords(s, " ")

	def run(self, view, args):
		transformSelectionText(functools.partial(self.title), view)

	def isEnabled(self, view, args):
		return view.hasNonEmptySelectionRegion()
