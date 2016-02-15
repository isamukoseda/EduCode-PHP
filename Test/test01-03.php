<?php
$a = 1; /* グローバルスコープ */ 

function test() { 
    echo 'in test():: $a = ['.$a.']'.PHP_EOL; /* ローカルスコープ変数の参照 */ 
} 

test();
echo 'Global:: $a = ['.$a.']'.PHP_EOL;
?>