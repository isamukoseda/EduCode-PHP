<?php
    // 共通処理の読み込み
    require_once('../common/common.php');       // 共通処理定義を読み込む
    sessionCheck();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>まるまるショップ</title>
    </head>
    <body>

<?php
    // セッションの開始
    // session_start();
    // session_regenerate_id(true);
    
    // ログイン状況のチェックを実施
    /*
    if (isset($_SESSION['login']) == false) {
        print 'ログインされていません。<br>';
        print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
        exit();
    } else {
        print $_SESSION['staff_name'];
        print 'さんログイン中<br>';
        print '<br>';
    }
    */

    // 共通処理の読み込みと共通ヘッダ情報の表示
    // require_once('../common/common.php');       // 共通処理定義を読み込む
    // printShopHtmlHeader();                      // HTMLヘッダの表示

    try {

        // スタッフコードを取得して変数($staff_code)に代入する
        $staff_code = $_POST['code'];

        // MySQLに接続する
        $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
        $user = 'shopadmin';
        $password = 'AdminPassword';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // スタッフコードに一致するレコードを削除する
        $sql = 'DELETE FROM shop_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt->execute($data);

        // MySQLの接続を切断する
        $dbh = null;
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>
<!-- PHP文の終了 -->

        削除しました。<br>
        <br>
        <a href="staff_list.php"> 戻る</a>

    </body>
</html>