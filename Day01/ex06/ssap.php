#!/usr/bin/php
<?php
 $array = array();
 unset($argv[0]);
 foreach($argv as $elem){
    $tmp = array_filter(explode(' ', $elem));
    foreach ($tmp as $elem2)
        array_push($array, $elem2);
}
sort($array);
foreach ($array as $elem)
    echo $elem."\n";
?>
