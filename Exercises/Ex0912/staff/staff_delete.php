<?php
    // 共通処理の読み込み
    require_once('../common/common.php');       // 共通処理定義を読み込む
    sessionCheck();

    printShopHtmlHeader();                      // HTMLヘッダの表示

        try {
            // スタッフコードを取得して変数($staff_code)に代入する
            $staff_code = $_GET['staffcode'];

            // MySQLに接続する
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            $user = 'shopadmin';
            $password = 'AdminPassword';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // スタッフコードに一致するスタッフ名を取得する
            $sql = 'SELECT name FROM shop_staff WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            // SQLの実行結果を処理する
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];

            // MySQLtoの接続を切断する
            $dbh = null;
        } catch (Exception $e) {
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>
        <!-- PHP文の終了 -->

        <!-- スタッフ削除フォームの本文 -->
        スタッフ削除<br>
        <br>
        スタッフコード<br>
        <?php print $staff_code; ?>
        <br>
        スタッフ名<br>
        <?php print $staff_name; ?>
        <br>
        このスタッフを削除してよろしいですか？<br>
        <br>
        
        <!-- formタグでsubmitした先をstaff_delete_done.php（スタッフ削除処理）に指定する -->
        <form method="post" action="staff_delete_done.php">
            <input type="hidden"name="code" value="<?php print $staff_code; ?>">
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="ＯＫ">
        </form>

    </body>
</html>