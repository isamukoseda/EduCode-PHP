<?php
    $foo = 'Bob';              // 値'Bob'を$fooに代入する。
    $bar = &$foo;              // $fooを$barにより参照
    $bar = "My name is $bar";  // $barを変更...
    echo $bar.PHP_EOL;
    echo $foo.PHP_EOL;                 // $fooも変更される。
?>