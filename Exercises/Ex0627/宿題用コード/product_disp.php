/*
 * 宿題用のコード：
 * 
 * 商品一覧画面から「表示」を選択した際に、選択した商品の情報を表示する。
 * 商品の情報は、データベースのshop_productテーブルに保存されているので、そのデータを取得して表示します。
 * 
 * 以下に、商品の詳細を確認する為のコードが記述されていますが、一部＜？？？＞となっている部分を正しく書き直して下さい。
 */
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
            /*
             * Q1,Q2. shop_productテーブルから一覧画面で選択された商品の「名前、価格、画像名」をSELECT文を使って取得します。
             * Q3. WEHE句の条件（選択された商品）を指定します
             */
            $sql = 'SELECT ＜？？？＞ FROM shop_product WHERE ＜？？？＞';  // SQL文の設定。変数は?で指定する
            $stmt = $dbh->prepare($sql);                                    // SQL文の展開
            ＜？？？＞                                                      // SQL文の変数に商品コードを設定する
            $stmt->execute($data);                                          // SQL文の実行
            
            // SQLの実行結果を処理する
            /*
             * Q4. 名前を変数$pro_nameへ代入します
             * Q5. 価格を変数$pro_priceへ代入します
             * Q6. 画像名を変数$pro_gazou_nameへ代入します
             */
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);                          // 結果から1行だけ読み込む
            $pro_name = ＜？？？＞                                          // nameカラムの内容を変数$pro_nameへ代入する
            $pro_price = ＜？？？＞                                         // priceカラムの内容を変数$pro_priceへ代入する
            $pro_gazou_name = ＜？？？＞                                    // gazouカラムの内容を変数$pro_gazou_nameへ代入する

            // MySQLとの接続を切断する
            $dbh = null;
            
            // 画像が設定されている場合には、$disp_gazouにHTMLコードを設定する
            /*
             * Q7. 変数$pro_gazou_nameが設定されているかチェックします
             */
            if(＜？？？＞) {
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