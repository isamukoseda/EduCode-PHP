<?php
/* 
 * 配列-02
 * 
 * 配列の使い方（キーを省略した場合）
 *
 */
    $array = array("foo", "bar", "hello", "world");
    var_dump($array);
    echo PHP_EOL;
    
    unset($array);
    $array = array(
        "a",
        "b",
        6 => "c",
        "d",
    );
    var_dump($array);
    echo PHP_EOL;
?>