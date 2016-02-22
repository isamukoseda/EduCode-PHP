<?php

try {
    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    $user = 'shopadmin';
    $password = 'AdminPassword';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //
    print "Connect ... OK".PHP_EOL;
    
    // disconnect MySQL
    $dbh = null;
} catch (Exception $e) {
    print "ただいま障害により大変ご迷惑をお掛けしております。".PHP_EOL;
    exit($e->getMessage());
}

?>