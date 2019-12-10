#!/usr/bin/php
<?PHP
if ($argc < 2) {
    return;
}
function ft_concatenate($argv, $argc){
    $array = array();
    unset($argv[0]);
    foreach($argv as $elem){
        $tmp = array_filter(explode(' ', $elem));
        foreach ($tmp as $elem2)
        array_push($array, $elem2);
    }
    return $array;
}
function	custom_sort($str, $sort_str)
{
	$new_str = strtolower($str);
	$new_sort_str = strtolower($sort_str);
	$alphabet = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	for ($i = 0; ($i < strlen($str)) || ($i < strlen($sort_str)); $i++)
	{
		$pos_a = strpos($alphabet, $new_str[$i]);
		$pos_b = strpos($alphabet, $new_sort_str[$i]);
		if ($pos_a < $pos_b)
			return (-1);
		else if ($pos_a > $pos_b)
			return (1);
		else
			$i++;
	}
}
if ($argc > 1)
{
	$tab = ft_concatenate($argv, $argc);
	usort($tab, "custom_sort");
	foreach ($tab as $elem)
		echo ("$elem\n");
}
?>
