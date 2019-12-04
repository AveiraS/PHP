#!/usr/bin/php
<?php
    function ft_is_sort($array){
        $array_sort = $array;
        sort($array_sort);
        if (array_diff_assoc($array_sort, $array) == null)
            return true;
        return false;
    }
$tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
$tab[] = "What are we doing now ?";
if (ft_is_sort($tab))
    echo "The array is sorted\n";
else
    echo "The array is not sorted\n";
?>