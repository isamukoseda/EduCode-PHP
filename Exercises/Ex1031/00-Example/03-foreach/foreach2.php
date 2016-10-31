<?php
$arr = array("one", "two", "three");
reset($arr);

print "--- while ---\n";
while(list($key, $value) = each($arr)) {
	print "Key: $key | Value: $value\n";
}

print "\n--- foreach ---\n";
foreach($arr as $key=>$value) {
	print "Key: $key | Value: $value\n";
}

?>
