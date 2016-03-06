<?php
    /*
     * 演習02-1
     * 1から100までの偶数の値を持つ配列を作成する
     * 
     *    
     */
    $list=array();
    for($i=1, $j=0; $i<=10; $i++) {
        if($i%2 == 0) {
            //$list[$j] = $i;
            //$j++;
            $list[] = $i;
        }
    }
    
    echo '1) echo $list'.PHP_EOL;
    echo 'echo $list --> '.$list.PHP_EOL;
    echo PHP_EOL;
    echo '2) echo $list[0]'.PHP_EOL;
    echo 'echo $list[0] --> '.$list[0].PHP_EOL;
    echo PHP_EOL;
    echo '3) var_dump($list)'.PHP_EOL;
    var_dump($list);
    echo PHP_EOL;
    echo '4) print_r($list)'.PHP_EOL;
    print_r($list);
    print PHP_EOL;
?>
