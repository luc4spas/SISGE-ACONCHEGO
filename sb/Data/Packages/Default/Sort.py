import sublime, sublimeplugin
import random


# Uglyness needed until SelectionRegions will happily compare themselves
def srcmp(a, b):
	aa = a.begin();
	ba = b.begin();
	
	if aa < ba:
		return -1;
	elif aa == ba:
		return cmp(a.end(), b.end())
	else:
		return 1;


def srtcmp(ta, tb):
	return srcmp(ta[0], tb[0])


def permuteSelection(f, v):
	regions = [s for s in v.sel() if not s.empty()]
	regions.sort(srcmp)
	txt = [v.substr(s) for s in regions]	
	txt = f(txt)

	# no sane way to handle this case
	if len(txt) != len(regions):
		return

	# Do the replacement in reverse order, so the character offsets don't get
	# invalidated
	combined = zip(regions, txt)
	combined.sort(srtcmp, reverse=True)
	
	for x in combined:
		[r, t] = x		
		v.replace(r, t)


def caseInsensitiveSort(txt):
	txt.sort(lambda a, b: cmp(a.lower(), b.lower()))
	return txt


def caseSensitiveSort(txt):
	txt.sort(lambda a, b: cmp(a, b))
	return txt


def reverseList(l):
	l.reverse()
	return l


def shuffleList(l):
	random.shuffle(l)
	return l


def uniquealiseList(l):
	table = {}
	res = []
	for x in l:
		if x not in table:
			table[x] = x
			res.append(x)
	return res

	
def uniqueSelection(v):
	regions = [s for s in v.sel() if not s.empty()]
	regions.sort(srcmp)
	
	dupregions = []
	table = {}
	for r in regions:
		txt = v.substr(r)
		if txt not in table:
			table[txt] = r
		else:
			dupregions.append(r)
			
	dupregions.reverse()
	for r in dupregions:
		v.erase(r)


def expandNonEmptySelectionsToEntireLine(v):
	regions = [v.line(s) for s in v.sel() if not s.empty()]
	for r in regions:
		v.sel().add(r);


def permuteLines(f, v):
	expandNonEmptySelectionsToEntireLine(v)
	regions = [s for s in v.sel() if not s.empty()]
	if not regions:
		regions = [sublime.Region(0, v.size())]
	
	regions.sort(srcmp, reverse=True)
	
	for r in regions:
		txt = v.substr(r)
		lines = txt.splitlines()
		lines = f(lines)

		v.replace(r, u"\n".join(lines))


def hasMultipleNonEmptySelectionRegion(v):
	return len([s for s in v.sel() if not s.empty()]) > 1


class SortLinesCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		if "caseSensitive" in args:
			permuteLines(caseSensitiveSort, view)
		else:
			permuteLines(caseInsensitiveSort, view)
			
		if "reverse" in args:
			permuteLines(reverseList, view)
		if "removeDuplicates" in args:
			permuteLines(uniquealiseList, view)


class SortSelectionCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		if "caseSensitive" in args:
			permuteSelection(caseSensitiveSort, view)
		else:
			permuteSelection(caseInsensitiveSort, view)
			
		if "reverse" in args:
			permuteSelection(reverseList, view)
		if "removeDuplicates" in args:
			uniqueSelection(view)
		
	def isEnabled(self, view, args):
		return hasMultipleNonEmptySelectionRegion(view)


class PermuteLinesCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		funcs = {"reverse": reverseList, "shuffle": shuffleList,
			"unique": uniquealiseList }
		if len(args) > 0 and args[0] in funcs:
			permuteLines(funcs[args[0]], view)
			

class PermuteSelectionCommand(sublimeplugin.TextCommand):
	def run(self, view, args):
		if len(args) > 0:
			if args[0] == "reverse":
				permuteSelection(reverseList, view)
			elif args[0] == "shuffle":
				permuteSelection(shuffleList, view)
			elif args[0] == "unique":
				uniqueSelection(view)

	def isEnabled(self, view, args):
		return hasMultipleNonEmptySelectionRegion(view)
