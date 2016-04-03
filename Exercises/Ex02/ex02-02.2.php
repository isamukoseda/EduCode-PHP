<?php
    /*
     * 演習02-2
     * 1から1000までの素数を表示する
     * 
     * 2以外の偶数をSkipして素数判定を実行する
     * 
     */
function isPrime($n)
{
    $i=2;
    for(; $i<$n; $i++) {
        if($n%$i == 0) {
            return FALSE;
        }
    }
    return TRUE;
}

    // Start
    $start_time = microtime(TRUE);
    $primenum = array();
    $primenum[] = 2;
    for($i=3; $i<=100; $i+=2) {
        if(isPrime($i) == TRUE) {
            $primenum[] = $i;
            // echo $i." , ";
        }
    }
    echo microtime(TRUE) - $start_time;
    echo PHP_EOL;
    echo "Total primenumber is ".count($primenum);  // 配列の要素数を調べる：count()
    echo PHP_EOL;
    

?>
