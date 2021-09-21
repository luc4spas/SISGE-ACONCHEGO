import sublime, sublimeplugin


def expandToLine(view, region):
	"""
	As view.fullLine, but doesn't expand to the next line if a full line is
	already selected
	"""
	if not (region.a == region.b) and view.substr(region.end() - 1) == '\n':
		return sublime.Region(view.line(region).begin(), region.end())
	else:
		return view.fullLine(region)


def extractLineBlocks(view):
	blocks = [expandToLine(view, s) for s in view.sel()]
	if len(blocks) == 0:
		return blocks

	# merge any adjacent blocks
	mergedBlocks = [blocks[0]]
	for block in blocks[1:]:
		lastBlock = mergedBlocks[-1]
		if block.begin() <= lastBlock.end():
			mergedBlocks[-1] = sublime.Region(lastBlock.begin(), block.end())
		else:
			mergedBlocks.append(block)

	return mergedBlocks


class swapLineCommand(sublimeplugin.TextCommand):
	"""
	Swaps the current line with the line before or the line after
	"""
	def run(self, view, args):
		if args[0] == "up":
			self.swapLineUp(view)
		elif args[0] == "down":
			self.swapLineDown(view)
		else:
			print "Wrong argument %s\n" % (args[0],)

	def swapLineUp(self, view):
		blocks = extractLineBlocks(view)

		# No selection
		if len(blocks) == 0:
			return

		# Already at BOF
		if blocks[0].begin() == 0:
			return

		# Add a trailing newline if required, the logic is simpler if every line
		# ends with a newline
		addTrailingNewline = (view.substr(view.size() - 1) != '\n') and blocks[-1].b == view.size()
		if addTrailingNewline:
			# The insert can cause the selection to move. This isn't wanted, so
			# reset the selection if it has moved to EOF
			sel = [r for r in view.sel()]
			view.insert(view.size(), '\n')
			if view.sel()[-1].end() == view.size():
				# Selection has moved, restore the previous selection
				view.sel().clear()
				for r in sel:
					view.sel().add(r)

			# Fix up any block that should now include this newline
			blocks[-1] = sublime.Region(blocks[-1].a, blocks[-1].b + 1)

		# Process in reverse order
		blocks.reverse()
		for b in blocks:
			prevLine = view.fullLine(b.begin() - 1)
			view.insert(b.end(), view.substr(prevLine))
			view.erase(prevLine)

		if addTrailingNewline:
			# Remove the added newline
			view.erase(sublime.Region(view.size() - 1, view.size()))

		# Ensure the selection is visible			
		view.show(view.sel(), False)

	def swapLineDown(self, view):
		blocks = extractLineBlocks(view)

		# No selection
		if len(blocks) == 0:
			return

		# Already at EOF
		if blocks[-1].end() == view.size():
			return

		# Add a trailing newline if required, the logic is simpler if every line
		# ends with a newline
		addTrailingNewline = (view.substr(view.size() - 1) != '\n')
		if addTrailingNewline:
			# No block can be at EOF (checked above), so no need to fix up the
			# blocks
			view.insert(view.size(), '\n')

		# Process in reverse order
		blocks.reverse()
		for b in blocks:
			nextLine = view.fullLine(b.end())
			contents = view.substr(nextLine)

			view.erase(nextLine)
			view.insert(b.begin(), contents)

		if addTrailingNewline:
			# Remove the added newline
			view.erase(sublime.Region(view.size() - 1, view.size()))

		# Ensure the selection is visible			
		view.show(view.sel(), False)
