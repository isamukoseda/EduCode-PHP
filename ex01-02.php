<?php
    /*
     * 演習01-2
     * 数字1984と文字列"cisco"を文字列系都合し、表示して下さい。
     * 
     *    
     */
    $year = 1984;
    $company = "cisco";
    
    echo gettype($year)." : ".gettype($company).PHP_EOL;
    
    $str = $year.$company;
    echo $str;
    echo PHP_EOL;

?>