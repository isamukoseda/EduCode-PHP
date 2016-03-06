<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>まるまるショップ</title>
    </head>
    <body>
        <!- PHP分の開始 ->
        <?php
        
        try {
            // 連想配列となっている$_POST配列から、'name'と'price'キーの内容を取得して、それぞれ変数に格納する
            $pro_name = $_POST['name'];
            $pro_price = $_POST['price'];
        
            // MySQLに接続する
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            $user = 'shopadmin';
            $password = 'AdminPassword';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // 商品テーブルにレコード（商品名と価格）を追加する
            $sql = 'INSERT INTO shop_product(name, price) VALUES (?, ?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_name;
            $data[] = $pro_price;
            $stmt->execute($data);
            
            // MySQLとの接続を切断する
            $dbh = null;
            
            // 確認用として追加した商品名を表示する。SQL文が正常に処理された場合には、この命令が実行される
            print $pro_name;
            print 'を追加しました。<br>';
        } catch(Exception $e) {
            // エラー発生時の処理を記述
            print 'ただいま障害により大変ご迷惑をお掛けしております';
            exit();
        }
        ?>
        <!- PHP文の終了 ->
        
        <!- 戻るボタンの配置（表示） ->
        <a href="product_add.html">戻る</a>
    </body>
</html>