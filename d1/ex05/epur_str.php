#!/usr/bin/php
<?php
if ($argc > 1)
{
	$str = trim($argv[1]);
	while ((strpos($str, "  ")) !== FALSE)
		$str = str_replace("  ", " ", $str);
	echo("$str\n");
}
?>