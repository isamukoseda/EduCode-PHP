<?php

    /*
     * 共通のHTMLヘッダを出力する処理
     * 
     * PHP_EOLは、環境に依存しない改行コードを出力。出力されたコードの可読性を高める為に、
     * ヘッダ部分のみ改行をするようにしてあります。
     */
    function printShopHtmlHeader() {
        
        print '<!DOCTYPE html>'.PHP_EOL;
        print '<html>'.PHP_EOL;
        print ' <head>'.PHP_EOL;
        print '  <meta charset="UTF-8">'.PHP_EOL;
        print '  <title>まるまるショップ</title>'.PHP_EOL;
        print ' </head>'.PHP_EOL;
        print ' <body>'.PHP_EOL;
    }
    
    function printShopHrmlFooter() {
        print '</html>'.PHP_EOL;
    }
    
    /*
     * ショッピングカートにログインしたユーザ名を表示する
     * （メンバー）ログインしていない場合には、ゲストユーザとして表示する
     * 
     * メンバー登録は、今回は実装しない予定
     */
    function printShopMemberName() {
        if (isset($_SESSION['member_login']) == false) {
            print 'ようこそゲスト様　';
            print '<br>'.PHP_EOL;
        }        
    }
    
    /*
     * MySQLへの接続処理
     * 
     * 引数として、「データベース名」「ホスト名」「ユーザ名」「パスワード」を指定する
     * $dbh(Database Hander)を戻り値として返す。
     * 
     * 注：エラーハンドリング処理を省略しているので注意
     */
    function connectDB($dbname, $hostname, $user, $password) {
        $dsn = "mysql:dbname=$dbname;host=$hostname;charset=utf8";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbh;
    }

    /*
     * スタッフ管理用のテーブルに接続する
     *
     *
     */
    function connectStaffTable() {
        
        // MySQLに接続する
        $dbname = "Shop";
        $hostname = "localhost";
        $user = "shopadmin";
        $password = "AdminPassword";
        $dbh = connectDB($dbname, $hostname, $user, $password);
    
        return $dbh;
    }


    function sessionCheck() {
        // セッションの開始
        session_start();
        session_regenerate_id(true);
        
        // var_dump($_SESSION);
    
        // ログイン状況のチェックを実施
        if (isset($_SESSION['login']) == false) {
            print 'ログインされていません。<br>';
            print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
            exit();
        } else {
            print $_SESSION['staff_name'];
            print 'さんログイン中<br>';
            print '<br>';
        }
    }


?>
