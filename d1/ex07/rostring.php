#!/usr/bin/php
<?php
    if (argc < 1){
        $str = $argv[1];
        while ((strpos($str, "  ")) == TRUE)
            $str = str_replace("  ", " ", $str);
        $tab = explode(" ", $str);
        $nb_word = count($tab);
        for ($i = 1; $i < $nb_word; $i++){
            echo $tab[$i]." ";
        }
        echo $tab[0]."\n";
    }
?>
