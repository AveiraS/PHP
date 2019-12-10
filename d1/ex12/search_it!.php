#!/usr/bin/php
<?php
if ($argc < 3) {
    exit();
}
$array = array();
for ($i = 2; $i < $argc; $i++) {
    $key = explode(':', $argv[$i]);
    if (count($key) == 2)
        $array[$key[0]] = $key[1];
}
if (array_key_exists($argv[1], $array)) {
    echo $array[$argv[1]]."\n";
}
?>
