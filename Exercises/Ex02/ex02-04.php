<?php
/*
 * 演習02-4
 * while()とfor()の違いを調べる
 * 
 */
    $a = 0;
    while($a<=10) {
        $a++;
        echo sprintf("%03d, ", $a);
    }
    echo PHP_EOL;
    echo PHP_EOL;
    
    for($a=0; $a<=10; $a++) {
        echo sprintf("%03d, ", $a);
    }
    echo PHP_EOL;
?>