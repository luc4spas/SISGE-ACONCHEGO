import sublime, sublimeplugin
import os.path
import functools


def findCommonPathPrefix(files):
    if len(files) > 1:
        # Remove any common prefix from the set of files, to drop redundant
        # information
        common = os.path.commonprefix(files)
        # os.path.commonprefix is calculated character by character, back up
        # to the nearest dir, if required.
        if not os.path.isdir(common):
            common = common[:-len(os.path.basename(common))]
            
        return common
    else:
        return ""

class PromptSelectFileCommand(sublimeplugin.WindowCommand):
    """Switch to another open file"""
    def run(self, window, args):
        views = window.views()
        
        fileSet = set()
        for v in views:
            if v.fileName():
                fileSet.add(v.fileName())
                
        commonPrefix = findCommonPathPrefix(fileSet)
        
        display = []
        selectedIndex = -1
        for v in views:
            basename = "untitled"
            if v.fileName():
                basename = v.fileName()[len(commonPrefix):]
            elif v.name():
                basename = v.name()
            
            if v.isDirty():
                display.append(basename + "*")
            else:
                display.append(basename)
                
            if window.activeView().id() == v.id():
                selectedIndex = len(display) - 1

        window.showSelectPanel(display,
            functools.partial(self.selectView, views, window), None,
            sublime.SELECT_PANEL_FILES, "", selectedIndex)

    def selectView(self, views, window, i):
        view = views[i];
        window.focusView(view)


class PromptOpenFileInCurrentDirectoryCommand(sublimeplugin.WindowCommand):
    """Open a file in the current directory"""
    
    badExtensions = ['.jpg', '.gif', '.png', '.pyc', '.pyo', '.bin', '.o',
        '.so', '.obj', '.lib', '.pdb', '.suo', '.ncb', '.dll', '.exe', '.zip',
        '.tar', '.gz', '.bz2', '.tgz', '.rar']

    def wantFile(self, f):
        root, ext = os.path.splitext(f)
        return os.path.isfile(f) and not ext in self.badExtensions

    def run(self, window, args):
        files = [f for f in os.listdir(os.getcwdu()) if self.wantFile(f)]
        files.sort()

        window.showQuickPanel("", "open", files, files,
            sublime.QUICK_PANEL_FILES | sublime.QUICK_PANEL_MULTI_SELECT)
