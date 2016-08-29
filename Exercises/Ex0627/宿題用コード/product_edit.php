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
            
            // product_branch.phpからGETコマンドで渡された商品コード（pcode）を取得して変数($pro_code)に代入する
            $pro_code = $_GET['pcode'];
            
            // MySQLに接続する（Database名はshop）
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';         // Database名は、shop
            $user = 'shopadmin';                                            // ユーザ名は、shopadmin
            $password = 'AdminPassword';                                    // パスワードは、adminadmin
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
            $pro_gazou_name_old = $rec['gazou'];                            // gazouガラムの内容を変数$pro_gazou_name_oldへ代入する
            
            // MySQLとの接続を切断する
            $dbh = null;
            
            //
            if($pro_gazou_name_old == '') {
                $disp_gazou = '';
            } else {
                $disp_gazou = '<img src="./gazou/'.$pro_gazou_name_old.'">';
            }
            
        } catch (Exception $e) {
            // エラー発生時の処理を記述（障害発生を表示）
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>
        <!-- PHP文の終了 -->
        
        <!-- 商品修正フォームの本文 -->
        商品修正<br>
        <br>
        商品コード<br>
        <?php print $pro_code; ?>
        <br>
        <br>
        
        <!-- formタグでsubmitした先をprduct_edit_check.php（商品修正チェック）に指定する -->
        <form method="post" action="product_edit_check.php" enctype="multipart/form-data">
            
            <!-- 商品コードをinputタグのhiddenにして、商品名と価格をinputタグのtextフィールドに設定する -->
            <!-- 商品コードはWeb画面に表示する必要が無いので、hiddenで設定する -->
            <input type="hidden" name="code" value="<?php print $pro_code; ?>">
            <input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
            <!-- 商品名を表示する -->
            商品名<br>
            <input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br>
            <!-- 価格を表示する -->
            価格<br>
            <input type="text" name="price" style="width:50px" value="<?php print $pro_price; ?>">円<br>
            画像を選んでください。<br>
            <input type="file" name="gazou" style="width:400px"><br>
            <br>

            <!-- 戻るボタンとSubmitボタンを配置する -->
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="ＯＫ">
        </form>

    </body>
</html>