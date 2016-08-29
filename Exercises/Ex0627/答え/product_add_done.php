<!DOCTYPE html>
<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <TITLE>まるまるショップ</TITLE>
    </HEAD>
    <BODY>

        <?php
        
        // MySQL接続時および操作時のエラーに対応する為に、エラーハンドリングの宣言をする
        try {

            //var_dump($_POST);
            //print '<br><br)';

            // POSTで送られた変数を取り出して格納する
            $pro_name = $_POST['name'];
            $pro_price = $_POST['price'];
            $pro_gazou_name = $_POST['gazou_name'];

            //$pro_name=htmlspecialchars($pro_name);
            //$pro_price=htmlspecialchars($pro_price);

            // MySQLに接続する（Database名はshop）
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';         // Database名は、shop
            $user = 'shopadmin';                                            // ユーザ名は、shopadmin
            $password = 'AdminPassword';                                    // パスワードは、adminadmin
            $dbh = new PDO($dsn, $user, $password);                         // PDOインスタンスを生成(new)することで、実際にMySQLへ接続処理が実行される
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // shop_productテーブルにレコード（商品名と価格）を追加する
            $sql = 'INSERT INTO shop_product(name,price,gazou) VALUES (?,?,?)';      // SQL文の設定。変数は?で指定する
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_name;                                            // 最初の変数に、商品名を設定する
            $data[] = $pro_price;                                           // 2番目の変数に、価格を設定する
            $data[] = $pro_gazou_name;                                      // 3番目の変数に、画像名称を設定する
            $stmt->execute($data);                                          // execute()で、SQLを実行する

            // MySQLとの接続を切断する
            $dbh = null;

            // 確認用として追加した商品名を表示する。SQL文が正常に処理された場合には、この命令が実行される
            print $pro_name;
            print 'を追加しました。<br />';
        } catch (Exception $e) {
            // エラー発生時の処理を記述
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            print $e;
            exit();
        }
        ?>

        <a href="product_list.php">戻る</a>

    </BODY>
</HTML>