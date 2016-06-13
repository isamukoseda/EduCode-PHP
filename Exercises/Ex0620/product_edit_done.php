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
            var_dump($_POST);
            
            // 連想配列となっている$_POST配列から、'code','name'と'price'キーの内容を取得して、それぞれ変数に格納する
            $pro_code = $_POST['pcode'];         // 商品コードを変数($pro_code)に代入する
            $pro_name = $_POST['name'];         // 商品名を変数($pro_name)に代入する
            $pro_price = $_POST['price'];          // 価格を変数($pro_price)に代入する

            //$pro_code=htmlspecialchars($pro_code);
            //$pro_name=htmlspecialchars($pro_name);
            //$pro_price=htmlspecialchars($pro_price);
            
            // MySQLに接続する（Database名はshop）
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            $user = 'shopadmin';
            $password = 'AdminPassword';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 商品テーブル($mst_product)から商品コードに一致するレコードのnameとpriceをUPDATE文を使って変更する
            $sql = 'UPDATE shop_product SET name=?,price=? WHERE code=?';    // SQL文の設定。変数は?で指定する
            $stmt = $dbh->prepare($sql);                                    // SQL文の展開
            $data[] = $pro_name;                                            // SQL文の変数に商品コードを設定する
            $data[] = $pro_price;                                           // SQL文の変数に価格を設定する
            $data[] = $pro_code;                                            // SQL文の変数に商品コードを設定する
            $stmt->execute($data);                                          // SQL文の実行
            /*
             * こっちの方がよりスマートな方法
            $sql = 'UPDATE shop_product SET name=:name, price=:price WHERE code=:code';
            $stmt=$dbh->prepare($sql);
            $stmt->bindParam(':name', $pro_name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $pro_price, PDO::PARAM_INT);
            $stmt->bindValue(':code', $pro_code, PDO::PARAM_INT);
            $stmt->execute();
            */

            // MySQLとの接続を切断する
            $dbh = null;
            
            print '修正しました。<br>';
        } catch (Exception$e) {
            // エラー発生時の処理を記述
            print'<P>ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>

        <a href="product_list.php">戻る</a>

    </body>
</html>
