<?php

    /*
     *
     */
    function print_list($list) {
        //print_r($list);
        echo PHP_EOL;
        for($i=1; $i<=100; $i+=10) {
            echo sprintf("%02d(%d) ", $i, $list[$i]);
            echo sprintf("%02d(%d) ", $i+1, $list[$i+1]);
            echo sprintf("%02d(%d) ", $i+2, $list[$i+2]);
            echo sprintf("%02d(%d) ", $i+3, $list[$i+3]);
            echo sprintf("%02d(%d) ", $i+4, $list[$i+4]);
            echo sprintf("%02d(%d) ", $i+5, $list[$i+5]);
            echo sprintf("%02d(%d) ", $i+6, $list[$i+6]);
            echo sprintf("%02d(%d) ", $i+7, $list[$i+7]);
            echo sprintf("%02d(%d) ", $i+8, $list[$i+8]);
            echo sprintf("%02d(%d) ", $i+9, $list[$i+9]);
            echo PHP_EOL;
        }
        echo PHP_EOL;
   }
   
   function print_primnum($primnum) {
       
       echo PHP_EOL;
       for($i=0; $i<=count($primnum); $i++) {
           for($j=0; $j<=$i; $J++) {
               echo sprintf("Pri[%02d] (%02d) ", $j, $primnum[$j]);
           }
       }
   }
    
    function isPrime($n) {
        $i=2;
        for(; $i<$n; $i++) {
            if($n%$i == 0) {
                return FALSE;
            }
        }
        return TRUE;
    }
    
    /*
     *
     */
    $primnum = array();
    $list = array();
    
    // 1から100までをふるいにのせる（list配列へ1を設定する）
    for($i=1; $i<=100; $i++) {
        $list[$i]=1;
    }
    echo PHP_EOL;
    //echo "***** Number: 1 ";
    //print_list($list);
    // print_primnum($primnum);
    echo "Primnumber list: ".count($primnum).PHP_EOL;
    
    /*
     * 1は素数に含めないので、2から100までをふるいにかけることを考える
     */
    $list[1] = 0;
    for($i=2; $i<=100; $i++) {
    
        // 素数かどうかをチェックする
        if(isPrime($i) == TURE) {
            // 素数の場合には、素数リストに値を設定する
            $primnum[] = $i;
            echo "Primnumber is: ".count($primnum).PHP_EOL;
            
            // 素数の倍数は、素数ではないのでふるい落とす
            $mag=2;
            while($i*$mag<=100) {
                $list[($i*$mag)] = 0;   // 0にすることでふるい落とす
                ++$mag;
            }
            
            echo PHP_EOL;
            echo "***** Number: $i";
            print_list($list);
            //echo "Primnumber List:".PHP_EOL;
            //print_primnum($primnum);
            echo PHP_EOL;
        }    
    }
    
    echo "Primnumber is: ".count($primnum).PHP_EOL;
    
?>