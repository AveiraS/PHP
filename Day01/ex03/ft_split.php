#!/usr/bin/php
<?php
    function ft_split($str){
        $result = array_filter(explode(' ', $str));
        sort($result);
        return $result;
    }
    print_r(ft_split("Hello World AAA"));
?>
