import sublime, sublimeplugin

class EchoCommand(sublimeplugin.ApplicationCommand):
	def run(self, args):
		print args
