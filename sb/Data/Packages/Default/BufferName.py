import sublime, sublimeplugin
import functools

class EditBufferNameCommand(sublimeplugin.WindowCommand):
    def run(self, window, args):

        view = window.activeView()

        window.showInputPanel("Buffer Name:", view.name(),
            functools.partial(self.onDone, view), None, None)

    def onDone(self, view, text):
        view.setName(text)
