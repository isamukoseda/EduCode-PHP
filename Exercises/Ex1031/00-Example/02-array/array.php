<?php

$array = array(1, 2, 3, 4, 5);
print "\n--- Step1 ---\n";
print_r($array);

// 
foreach($array as $i => $value) {
	unset($array[$i]);
}
print "\n--- Step2 ---\n";
print_r($array);

// 
$array[] = 6;
print "\n--- Step3 ---\n";
print_r($array);

//
$array = array_values($array);
$array[] = 7;
print "\n--- Step4 ---\n";
print_r($array);

?>
