<?php
    /*
     * 演習01-1
     * 以下の図形の面積をプログラムで計算して下さい
     * 
     *    
     * 
     */
    
    $area1 = 8 * 4;
    $area2 = 5 * 3;
    $area3 = (10 - 4 - 3) * 2;
    $total = $area1 + $area2 + $area3;
    
    echo "Area = ".$total;
    echo PHP_EOL;

    echo sprintf("%.3f", ( squre(2) * pi()));
    echo PHP_EOL;
    
    function squre($a) {
        return $a * $a;
    }
?>
 