<?php
$BootstrapFile = '../../../plugins/UsefulFunctions/bootstrap.console.php';
if (file_exists($BootstrapFile)) require $BootstrapFile;

$ProductCssFile = __DIR__ . '/__grid.css';
$VendorPrefixes = array('', '-moz-');
$ClassNames = array();
$CssRules = array();
$WidthRuleFormat['A'] = 'calc(100%%/%d - 10px);';
$WidthRuleFormat['Z'] = 'calc(100%% - 100%%/%d - 10px);';

for ($i = 1; $i <= 6; $i++) {
	foreach (array('A', 'Z') as $Name) {
		$Class = '.' . $Name . $i;
		//if ($Name == 'A') $CssRules[$Class][] = "width: " . (100 / $i - 1.76) . '%;';
		//if ($Name == 'Z') $CssRules[$Class][] = "width: " . (100 - 100/$i - 1.76) . '%;';
		$Format = $WidthRuleFormat[$Name];
		foreach ($VendorPrefixes as $Px) {
			$CssRules[$Class][] = 'width: ' . $Px . sprintf($Format, $i);
		}
	}
}
unset($CssRules['.Z1']);

$ClassNames = implode(', ', array_keys($CssRules));

$Columns = '';

foreach ($CssRules as $ClassName => $Rules) {
	$Rules = implode("\n\t", $Rules);
	$Columns .= "\n$ClassName {\n\t" . $Rules . "\n}\n";
}

$Css = <<<CSS
.Row {
	margin: 0 0 20px 0;
	display: block;
}

.Row div {
    vertical-align: top;
}

.Row div:first-child {
	margin-left: 0px;
}

$ClassNames {
	display: inline-block;
    margin-left: 10px;
}

$Columns
CSS;


file_put_contents($ProductCssFile, $Css);



