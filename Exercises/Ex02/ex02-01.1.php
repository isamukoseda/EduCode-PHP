<?php
    /*
     * 演習02-1
     * 1から100までの偶数の値を持つ配列を作成する
     * 
     *    
     */
     $i=100;
     $list=array();
     while($i>1) {
         if($i%2 == 0) {
             $list[] = $i;
         }
         $i--;
     }

    print_r($list);
    print(PHP_EOL);
?>
