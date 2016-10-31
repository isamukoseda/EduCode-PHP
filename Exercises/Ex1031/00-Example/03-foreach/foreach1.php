<?php
$arr = array("one", "two", "three");
reset($arr);

print "--- while ---\n";
while(list(, $value) = each($arr)) {
	print "Value: $value\n";
}

print "\n--- foreach ---\n";
foreach($arr as $value) {
	print "Value: $value\n";
}

?>
