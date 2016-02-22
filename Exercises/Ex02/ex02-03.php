<?php
    /*
     * 演習02-3
     * Fizz buzzを100まで行う
     *  1から100までを表示
     *  3で割り切れる時はfizz、5で割り切れる時はbuzzと表示
     *  3でも5でも割り切れる時はFizzBuzzと表示する
     * 
     *    
     */
    for($i=1; $i<=100; $i++) {
        
        print PHP_EOL;
        # echo sprintf('[%03d] ', $i);
        
        if($i%3 == 0 && $i%5 == 0) {
            echo 'FizzBuzz';
        } elseif($i%3 == 0) {
            echo 'fizz';
        } elseif($i%5 == 0) {
            echo 'buzz';
        } else {
            echo $i;
        }
    }
    print PHP_EOL;
?>
