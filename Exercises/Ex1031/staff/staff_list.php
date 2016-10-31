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

        // MySQL接続時および操作時のエラーに対応する為に、エラーハンドリングの宣言をする
        try {

            // MySQLに接続する
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            $user = 'shopadmin';
            $password = 'AdminPassword';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // shop_staffテーブルから、code, nameを全て取得する
            $sql = 'SELECT code,name FROM shop_staff';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            // MySQLとの接続を切断する
            $dbh = null;

            // スタッフの一覧を表示
            print 'スタッフ一覧<br/><br/>';

            // formタグにより、submit時の実行先をstaff_branch.phpに設定する
            print '<form method="post" action="staff_branch.php">';
            while (true) {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($rec == false) {    // レコードを全て読み込んだ場合
                    break;
                }
                print '<input type="radio" name="staffcode" value="' . $rec['code'] . '">';
                print $rec['name'];
                print '</br>';
            }

            // 指定したスタッフに対するアクションをsubmitボタンのname変数に設定する
            print '<input type="submit" name="disp" value="参照">';
            print '<input type="submit" name="add" value="追加">';
            print '<input type="submit" name="edit" value="修正">';
            print '<input type="submit" name="delete" value="削除">';
            print '</form>';
            // show logout link
            print '<br>';
            print '<a href="../staff_login/staff_top.php">トップ画面へ</a>';
        } catch (Exception $e) {
            // エラー発生時の処理を記述
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>

        <br>
    </body>
</html>