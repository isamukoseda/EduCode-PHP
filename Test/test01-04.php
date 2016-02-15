<?php
$a_global = 1;
$b_global = 2;

function Sum() 
{
    global $a_global;
    $b_local=4;

    $b_local = $a_global + $b_local;
    echo $a_global." : ".$b_local." ----> ";
    
    return $b_local;
} 

Sum();
echo $b_global;
echo PHP_EOL;
print(PHP_EOL);
print PHP_EOL;
?>