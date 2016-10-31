<?php

// 共通処理の読み込み
require_once('../common/common.php');       // 共通処理定義を読み込む

try {
    // スタッフコードとパスワードを取得して変数に代入する
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];

    // Staffテーブルに接続する
    $dbh = connectStaffTable();

    // スタッフ名とパスワードに一致するレコードからスタッフコードを取得する
    $code = get_StaffCode($dbh, $staff_name, $staff_pass);
    $dbh = null;                                        // データベースを切断する
    if ($code == false) {
        // 一致するレコードがない場合
        print_ErrorMsg();
    } else {
        // 一致するレコードが存在する場合（≒ログイン成功）
        session_start();                                // セッションの開始
        $_SESSION['login'] = 1;                         // セッション情報にlogin変数を設定
        $_SESSION['staff_code'] = $code;                // セッション情報にスタッフコードを設定
        $_SESSION['staff_name'] = $staff_name;          // セッション情報にスタッフ名を設定
        header('Location:staff_top.php');               // staf_top.phpへ
        exit();
    }
} catch (Exception $e) {
    // エラー時の処理を記述
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
	print $e;
    exit();
}

/*
 * スタッフ名とパスワード(MD5)をキーにStaffテーブルからスタッフコードを取得する
 * 取得できない場合はfalseを返す
 *
 * 例外処理は後で考える
 *
 *
 * @param  PDO $dbh        : Database Hander, pointer of Connected Database.
 * @param  string $name    : Target(Staff) Name
 * @param  string $pass    : Target(Staff)'s Password
 * @return int code / false
 */
function get_StaffCode($dbh, $name, $password) {
    
    // パスワードをMD5でハッシュ化
    $password = md5($password);
    
    // スタッフ名とパスワードに一致するレコードからスタッフコードを取得する
    $sql = 'SELECT code FROM shop_staff WHERE name=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $name;
    $data[] = $password;
    $stmt->execute($data);

    // SQL文を実行する
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    // SQL文の実行結果によって処理を分岐
    if ($rec == false) {
        return false;
    } else {
        // 一致するレコードが存在する場合（≒ログイン成功）
        return $rec['code'];
    }    
}

/*
 * ログインがエラーとなった場合の画面表示
 * 
 */
function print_ErrorMsg() {
    
    // HEADER
    printShopHtmlHeader();
    
    // BODY
    print ' スタッフ名かパスワードが間違っています。<br>'.PHP_EOL;
    print ' <a href="staff_login.html"> 戻る</a>'.PHP_EOL;
    
    // FOOTER and END
    print ' </body>'.PHP_EOL;
    print "</html>".PHP_EOL;
    
}

?>
