<?php
    $x1 = TRUE;
    $mikan = 12;
    $a_str  = "foo ($mikan)";
    $a_str2 = 'foo ('.$mikan.')';

    # echo gettype($x1)." : ";
    echo $a_str." : ";
    echo $a_str2;
    echo PHP_EOL;
    
    echo '$a_str2 is '.gettype($a_str2);
    echo PHP_EOL;
    
    $x1 = $a_str2;
    echo '$x1 is '.gettype($x1);
    echo PHP_EOL;
?>