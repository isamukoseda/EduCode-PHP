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

            // mst_productテーブルから、code,name,priceを全て取得する
            $sql = 'SELECT code,name,price FROM shop_product';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            // 商品一覧のタイトルを表示
            print '商品一覧<br><br>';

            // formタグを設置して、submit時の飛び先をproduct_branch.phpに設定する
            print '<form method="post" action="product_add.php">';
            // MySQLから取得したデータ（レコード）をwhileループを使って全て表示する
            while (true) {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);  // 1レコード文を読み出す
                if ($rec == false) {
                    // レコードを全て読み終わったらwhileループを抜ける
                    break;
                }
                print '<input type="radio" name="pcode" value="' . $rec['code'] . '">';   // ラジオボタンに商品コードを割り当てる
                print $rec['name'] . ' ... ';                                               // 商品名を表示
                print $rec['price'] . '円';                                                 // 価格を表示
                print '<br>';
            }
            
            // 指定した商品に対するアクションをsubmitボタンのname変数に設定する
            //print '<input type="submit" name="disp" value="表示">';     // 表示(disp)
            print '<input type="submit" name="add" value="追加">';      // 追加(add)
            //print '<input type="submit" name="edit" value="修正">';     // 修正(edit)
            //print '<input type="submit" name="delete" value="削除">';   // 削除(delet)
            
            print '</form>';

            // MySQLとの接続を切断する
            $dbh = null;
            
        } catch (Exception $e) {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        ?>

        <br>
    </body>
</html>