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
            
            // 商品一覧画面から指定された商品の商品コードを取得して、変数($pro_code)に格納する
            $pro_code = $_GET['pcode'];

            // MySQLに接続する（Database名はshop）
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';         // Database名は、shop
            $user = 'shopadmin';                                            // ユーザ名は、shopadmin
            $password = 'AdminPassword';                                       // パスワードは、adminadmin
            $dbh = new PDO($dsn, $user, $password);                         // PDOインスタンスを生成(new)することで、実際にMySQLへ接続処理が実行される
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // 商品テーブル(shop_product)から商品コードに一致するレコードのnameとpriceをSELECT文を使って取得する
            $sql = 'SELECT name,price,gazou FROM shop_product WHERE code=?';       // SQL文の設定。変数は?で指定する
            $stmt = $dbh->prepare($sql);                                    // SQL文の展開
            $data[] = $pro_code;                                            // SQL文の変数に商品コードを設定する
            $stmt->execute($data);                                          // SQL文の実行
            
            // SQLの実行結果を処理する
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);                          // 結果から1行だけ読み込む
            $pro_name = $rec['name'];                                       // nameカラムの内容を変数$pro_nameへ代入する
            $pro_price = $rec['price'];                                     // priceカラムの内容を変数$pro_priceへ代入する
            $pro_gazou_name = $rec['gazou'];
            // var_dump($pro_gazou_name);

            // MySQLとの接続を切断する
            $dbh = null;
            
            //
            if($pro_gazou_name == '') {
                $disp_gazou = '';
            } else {
                $disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">';
            }
            // var_dump($disp_gazou);
            
        } catch (Exception $e) {
            // エラー発生時の処理を記述（障害発生を表示）
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>
        <!-- PHP文の終了 -->
        
        <!-- 商品参照フォームの本文 -->
        商品情報参照<br>
        <br>
        商品コード<br>
        <?php print $pro_code; ?>
        <br>
        商品名<br>
        <?php print $pro_name; ?>
        <br>
        価格<br>
        <?php print $pro_price; ?>円
        <br>
        <?php print $disp_gazou; ?>
        <br>
        
        <!-- 前のページ(商品一覧）に戻るボタンを表示する -->
        <form>
            <input type="button" onclick="history.back()" value="戻る">
        </form>

    </body>
</html>