bindReady(function(){
	
	var DomPrefixes = ['-khtml-', '-o-', '-webkit-', '-moz-', ''];
	var Dummy = document.createElement('Dummy');
	var CssStyleDeclaration = Dummy.style;
	var CalcSupport = false;
	
	for (var Index = DomPrefixes.length - 1; Index >= 0; --Index) {
		CssStyleDeclaration.cssText = "width: " + DomPrefixes[Index] + "calc(8% + 1px)";
		if (CssStyleDeclaration.width.indexOf('calc') != -1) {
			CalcSupport = true;
			break;
		}
	}
	if (CalcSupport) return;
	
	// No support
	// TODO: fix css grid by javascript if no support
	// TODO: Put css file into head
	
	var ClassNames = '.A1, .A2, .Z2, .A3, .Z3, .A4, .Z4, .A5, .Z5, .A6, .Z6, .A7, .Z7, .A8, .Z8, .A9, .Z9, .A10, .Z10, .A11, .Z11, .A12, .Z12';
	var BodyWidth = $('#Body').width();
	var ParentWidth;
	var Width;
	
	if (typeof(jQuery) != 'undefined') {
	}
});

