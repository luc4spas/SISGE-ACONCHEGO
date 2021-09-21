import sublime, sublimeplugin
import functools
import sys

class GotoSymbolCommand(sublimeplugin.TextCommand):
    def gotoRegion(self, view, regions, index):
        view.sel().clear()
        view.sel().add(regions[index])
        view.show(view.sel(), True)

    def run(self, view, args):
        pt = view.sel()[0].b
        symbols = view.getSymbols()

        if len(symbols) == 0:
            sublime.statusMessage("No symbols")
            return

        display = [sym for sr,sym in symbols]
        regions = [sr for sr,sym in symbols]

        minDist = sys.maxint
        selectedIndex = -1
        for i in xrange(0, len(regions)):
            r = regions[i]
            d1 = pt - r.a
            d2 = pt - r.b

            if d1 < minDist and d1 >= 0:
                selectedIndex = i
                minDist = d1

            if d2 < minDist and d2 >= 0:
                selectedIndex = i
                minDist = d2

        view.window().showSelectPanel(display,
            functools.partial(self.gotoRegion, view, regions),
            None, sublime.SELECT_PANEL_MONOSPACE_FONT, "", selectedIndex)
