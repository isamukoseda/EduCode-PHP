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

        <!-- PHP文の開始 -->
        <?php
        try {

            // スタッフコードを取得して変数($staff_code)に代入する
            $staff_code = $_GET['staffcode'];

            // MySQLに接続する
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            $user = 'shopadmin';
            $password = 'AdminPassword';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // スタッフコードに一致する
            $sql = 'SELECT name FROM shop_staff WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            // SQLの実行結果を処理する
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];

            // MySQLの接続を切断する
            $dbh = null;
        } catch (Exception $e) {
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>

        <!-- スタッフ参照フォームの本文 -->
        スタッフ情報参照<br>
        <br>
        スタッフコード<br>
        <?php print $staff_code; ?>
        <br>
        スタッフ名<br>
        <?php print $staff_name; ?>
        <br>
        <br>
        
        <!-- 前のページ(スタッフ一覧）に戻るボタンを表示する -->
        <form>
            <input type="button" onclick="history.back()" value="戻る">
        </form>

    </body>
</html>