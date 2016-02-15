<?php
    /*
     * 演習02-1
     * 1から100までの偶数の値を持つ配列を作成する
     * 
     *    
     */
    $list=array();
    for($i=1, $j=0; $i<=100; $i++) {
        if($i%2 == 0) {
            $list[$j] = $i;
            $j++;
        }
    }
    
    var_dump($list);
    print(PHP_EOL);
?>
