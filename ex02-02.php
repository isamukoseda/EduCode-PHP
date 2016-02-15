<?php
    /*
     * 演習02-2
     * 1から1000までの素数を表示する
     * 
     *    
     */
    $primenum = array();
    for($i=2; $i<=1000; $i++) {
        $flag = FALSE;
        for($j=2; $j<$i; $j++) {
            if($i%$j == 0) {
                $flag = TRUE;
                break;
            }
        }
        if($flag == FALSE) {
            $primenum[] = $i;
            echo $i." , ";
        }
    }
    echo PHP_EOL;
    echo "Total primenumber is ".count($primenum);  // 配列の要素数を調べる：count()
    # echo var_dump($primenum);
    echo PHP_EOL;
/*    
    for($i=2; $i<=1000; $i++) {
        $cnt=0;
        for($j=1; $j<=$i; $j++) {
            if($i%$j == 0) {
                $cnt++;
            }
        }
        echo sprintf("%03d] %02d ... ", $i, $cnt);
        if($cnt == 2) {
            echo "Primenumber";
        } else {
            echo "---";
        }
        echo PHP_EOL;
    }
*/
?>
