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
            
            // 連想配列となっている$_POST配列から、name'キーの内容を取得して、変数に格納する
            $pro_code = $_POST['code'];                 // 商品コードを変数($pro_code)に代入する
            $pro_gazou_name = $_POST['gazou_name'];     // 画像名を変数($pro_gazou_name)に代入する
            
            // MySQLに接続する（Database名はshop）
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            $user = 'shopadmin';
            $password = 'AdminPassword';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // 商品テーブル(shop_product)から商品コードに一致するレコードをDELETE文を使って削除する
            $sql = 'DELETE FROM shop_product WHERE code=?';              // SQL文の設定。変数は?で指定する
            $stmt = $dbh->prepare($sql);                                // SQL文の展開
            $data[] = $pro_code;                                        // SQL文の変数に商品コードを設定する
            $stmt->execute($data);                                      // SQL文の実行
            
            // MySQLとの接続を切断する
            $dbh = null;
            
            // 画像ファイルの削除
            if($pro_gazou_name != '') {
                unlink('./gazou/'.$pro_gazou_name);
            }
            
        } catch (Exception $e) {
            // エラー発生時の処理を記述
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>
        <!-- PHP文の終了 -->

        <!-- 削除メッセージの表示 -->
        削除しました。<br>
        <br>
        <!-- 戻るボタン配置する -->
        <a href="product_list.php"> 戻る</a>

    </body>
</html>