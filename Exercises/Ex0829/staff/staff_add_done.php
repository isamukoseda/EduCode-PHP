<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>まるまるショップ</title>
    </head>
    <body>

    <?php
    try {

        // POSTで送られた変数を取り出して格納する
        $staff_name = $_POST['name'];
        $staff_pass = $_POST['pass'];

        //$staff_name = htmlspecialchars($staff_name);
        //$staff_pass = htmlspecialchars($staff_pass);

         // MySQLに接続する（Database名はshop）
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';             // Database名は、shop
        $user = 'shopadmin';                                                // ユーザ名を設定
        $password = 'adminadmin';                                           // パスワードを設定
        $dbh = new PDO($dsn, $user, $password);                             // PDOインスタンスを生成して、Databaseと接続
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // shop_staffテーブルにレコード（スタッフ名、パスワード）を追加する
        $sql = 'INSERT INTO shop_staff (name,password) VALUES (?,?)';        // SQL文の設定。変数は?で記述する
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_name;                                              // 最初の変数に、スタッフ名を設定
        $data[] = $staff_pass;                                              // 2番目の変数に、パスワードを設定
        $stmt->execute($data);                                              // SQL文の実行

        // Databaseとの接続を切断
        $dbh = null;

        // 確認用として追加したスタッフ名を表示する。
        print $staff_name;
        print 'さんを追加しました。<br>';
    } catch (Exception $e) {
        // エラー発生時の処理を以下に記述
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>

    <a href="staff_list.php"> 戻る</a>

    </body>
</html>