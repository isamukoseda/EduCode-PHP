<?php
    /*
     * 演習02-2
     * 1から1000までの素数を表示する
     * 
     * functionを使って、素数判定処理を関数化する
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
    for($i=2; $i<=1000; $i++) {
        if(isPrime($i) == TRUE) {
            $primenum[] = $i;
            //echo $i." , ";
        }
    }
    echo microtime(TRUE) - $start_time;
    echo PHP_EOL;
    echo "Total primenumber is ".count($primenum);  // 配列の要素数を調べる：count()
    echo PHP_EOL;
    

?>
