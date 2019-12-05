#!/usr/bin/php
<?php
if ($argc < 2)
	exit();
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR');
$str = strptime($argv[1], '%A %d %B %Y %H:%M:%S');
if ($str === false)
{
	echo "Wrong Format\n";
	exit();
}
echo (mktime($str["tm_hour"], $str["tm_min"], $str["tm_sec"], $str["tm_mon"] + 1, $str["tm_mday"], $str["tm_year"] + 1900))."\n";
?>
