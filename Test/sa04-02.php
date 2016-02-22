<?php
/* 
 * 
 * 
 * 
 *
 */
    func_recursion(5);

    function func_recursion($a) {
        if($a < 10) {
            echo $a.PHP_EOL;
            func_recursion($a + 1);
        }
    }
    
 ?>