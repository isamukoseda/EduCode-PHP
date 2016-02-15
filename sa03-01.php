<?php
/* 
 * 配列-01
 * 
 * 配列の使い方
 *
 */

    // array()による配列の作成
    $array = array(
        "foo" => "bar",
        "bar" => "foo",
    );
    
    var_dump($array);
    echo PHP_EOL;
    
    // 配列全体を削除
    unset($array);
    var_dump($array);
    echo PHP_EOL;
    
    // PHP 5.4からサポートされた形式
    $array = [
        "foo" => "bar",
        "bar" => "foo",
    ];
    var_dump($array);
    echo PHP_EOL;
    print_r($array);
    echo PHP_EOL;
    
?>