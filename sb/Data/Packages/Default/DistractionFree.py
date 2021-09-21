import sublime, sublimeplugin


class DistractionFreeCommand(sublimeplugin.TextCommand):
    def run(self, view, args):
        if not view.options().get('distractionFreeMode'):
            view.options().set('distractionFreeMode', True)
            view.options().set('drawCentered', True)
            view.options().set('gutter', False)
            view.options().set('highlightLine', False)
            view.options().set('wrapWidth', 80)
            view.options().set('wordWrap', True)
            view.options().set('wantScrollBars', False)
            view.options().set('rulers', '')

            window = view.window()
            if not window.isFullScreen():
                window.runCommand('toggleFullScreen')

        else:
            # Drop the explicit options previously set, letting the defaults
            # show through.
            view.options().erase('distractionFreeMode')
            view.options().erase('drawCentered')
            view.options().erase('gutter')
            view.options().erase('highlightLine')
            view.options().erase('wrapWidth')
            view.options().erase('wordWrap')
            view.options().erase('wantScrollBars')
            view.options().erase('rulers')

            window = view.window()            
            if window.isFullScreen():
                window.runCommand('toggleFullScreen')
