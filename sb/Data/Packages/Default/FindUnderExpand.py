import sublime, sublimeplugin
import functools


class FindUnderExpandCommand(sublimeplugin.TextCommand):
    """Add the next occurance of the word under the cursor to the selection"""

    def run(self, view, args):

        sel = [s for s in view.sel()]

        newSel = []

        for s in sel:
            view.sel().clear()
            view.sel().add(s)

            view.window().runCommand('findUnder')

            for ns in view.sel():
                newSel.append(ns)

        view.sel().clear()

        for s in sel:
            view.sel().add(s)

        for s in newSel:
            view.sel().add(s)
