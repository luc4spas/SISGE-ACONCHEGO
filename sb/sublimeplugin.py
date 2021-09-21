import os
import sys

applicationCommands = {}
windowCommands = {}
textCommands = {}

allCommands = [applicationCommands, windowCommands, textCommands]

allCallbacks = {'onNew': [], 'onClone': [], 'onLoad': [], 'onClose': [],
	'onPreSave': [], 'onPostSave': [], 'onModified': [],
	'onSelectionModified': [],'onActivated': [], 'onProjectLoad': [],
	'onProjectClose': [], 'onQueryContext': []}

def removeValueFromDict(d, value):
	for i in d.items():
		[k, v] = i
		if v == value:
			del d[k]

def commandName(clsname):
	clsname = clsname[0].lower() + clsname[1:]
	if clsname[-7:] == "Command":
		clsname = clsname[:-7]
	return clsname

def reloadPlugin(fname):
	print "Reloading plugin", fname
	path = os.path.dirname(fname)

	# Change the current directory to that of the module. It's not safe to just
	# add the modules directory to sys.path, as that won't accept unicode paths
	# on Windows
	oldpath = os.getcwdu()
	os.chdir(path)

	modulename, ext = os.path.splitext(os.path.basename(fname))

	wasloaded = modulename in sys.modules
	m = __import__(modulename)
	if wasloaded:
		# Unload the old plugins
		if "plugins" in m.__dict__:
			for p in m.plugins:
				for cmd in allCommands:
					removeValueFromDict(cmd, p)
				for c in allCallbacks.values():
					try:
						c.remove(p)
					except ValueError:
						pass

		# Reload the module
		reload(m)

	# Restore the current directory
	os.chdir(oldpath)

	modulePlugins = []
	for typ in dir(m):
		try:
			cmdName = commandName(typ)
			t = m.__dict__[typ]
			if t.__bases__ and issubclass(t, Plugin):
				obj = m.__dict__[typ]()

				if issubclass(t, ApplicationCommand):
					applicationCommands[cmdName] = obj
				if issubclass(t, WindowCommand):
					windowCommands[cmdName] = obj
				if issubclass(t, TextCommand):
					textCommands[cmdName] = obj

				for p in allCallbacks.iteritems():
					if p[0] in dir(obj):
						p[1].append(obj)

				modulePlugins.append(obj)

		except AttributeError:
			pass

	if len(modulePlugins) > 0:
		m.plugins = modulePlugins


def execApplicationCommand(name, args):
	if name in applicationCommands:
		applicationCommands[name].run(args)


def isApplicationCommandEnabled(name, args):
	if name in applicationCommands:
		return applicationCommands[name].isEnabled(args)
	return False


def hasApplicationCommand(name):
	return name in applicationCommands


def execWindowCommand(window, name, args):
	if name in windowCommands:
		windowCommands[name].run(window, args);


def isWindowCommandEnabled(window, name, args):
	if name in windowCommands:
		return windowCommands[name].isEnabled(window, args);
	return False


def hasWindowCommand(window, name):
	return name in windowCommands


def execTextCommand(view, name, args):
	if name in textCommands:
		textCommands[name].run(view, args);


def isTextCommandEnabled(view, name, args):
	if name in textCommands:
		return textCommands[name].isEnabled(view, args);
	return False

def hasTextCommand(view, name):
	return name in textCommands


def onNew(v):
	for callback in allCallbacks['onNew']:
		callback.onNew(v)

def onClone(v):
	for callback in allCallbacks['onClone']:
		callback.onClone(v)

def onLoad(v):
	for callback in allCallbacks['onLoad']:
		callback.onLoad(v)

def onClose(v):
	for callback in allCallbacks['onClose']:
		callback.onClose(v)

def onPreSave(v):
	for callback in allCallbacks['onPreSave']:
		callback.onPreSave(v)

def onPostSave(v):
	for callback in allCallbacks['onPostSave']:
		callback.onPostSave(v)

def onModified(v):
	for callback in allCallbacks['onModified']:
		callback.onModified(v)

def onSelectionModified(v):
	for callback in allCallbacks['onSelectionModified']:
		callback.onSelectionModified(v)

def onActivated(v):
	for callback in allCallbacks['onActivated']:
		callback.onActivated(v)

def onProjectLoad(w):
	for callback in allCallbacks['onProjectLoad']:
		callback.onProjectLoad(w)

def onProjectClose(w):
	for callback in allCallbacks['onProjectClose']:
		callback.onProjectClose(w)

def onQueryContext(v, key, value):
	for callback in allCallbacks['onQueryContext']:
		v = callback.onQueryContext(v, key, value)
		if v != None:
			return v
	return None

class Plugin(object):
	pass

class ApplicationCommand(Plugin):
	def run(self, args):
		return False

	def isEnabled(self, args):
		return True

class WindowCommand(Plugin):
	def run(self, window, args):
		return False

	def isEnabled(self, window, args):
		return True

class TextCommand(Plugin):
	def run(self, view, args):
		return False

	def isEnabled(self, view, args):
		return True
