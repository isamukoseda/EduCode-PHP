<?php
    /*
     * 商品の一覧を表示して
     * 　1. 選択した商品の詳細（画像も）を表示する
     * 　2. ショッピングカートの中身を見る
     * の両方の処理に移動するようにします。
     * 
     * 商品の一覧は、商品管理機能で登録した商品情報(mst_product)を取得して表示します。
     */
    session_start();
    session_regenerate_id(true);
    
    /*
     * 共通処理を纏めたファイルを読み込んで、HTMLヘッダの出力とショップメンバー名の表示処理を記述します。
     *
     * Q1. 巨痛処理を纏めたファイルを読み込む処理を記述して下さい。
     * Q2. 共通処理化したHTMLヘッダ出力処理を呼び出す処理を記述して下さい。
     */
    ？？？？？;       // 共通処理定義を読み込む
    ？？？？？;                      // HTMLヘッダの表示
    printShopMemberName();          // ショップメンバー名の表示

    try {

        /*
         * MySQLへ接続する。
         * （MySQLへの接続処理を共通処理化したConnectDB関数を呼び出す）
         */
        /*
         * 共通処理としたMySQLへの接続処理を記述します。
         * Q. MySQLへの接続処理を記述して下さい。
         */
        $dbh = ？？？？？;

        /*
         * 商品テーブルから商品コード、商品名、価格を取得する
         */
        $sql = 'SELECT code,name,price FROM shop_product';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;
        
        /*
         * 取得した商品を一覧表示する
         * 商品の詳細を表示する処理をGETで呼び出し、パラメターとして商品コードを渡す
         */
        print '商品一覧<br><br>';
        while (true) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
            print '<a href="shop_product.php?procode=' . $rec['code'] . '">';
            print $rec['name'] . '---';
            print $rec['price'] . '円';
            print '</a>';
            print '<br>';
        }
        
        /*
         * ショッピングカートの中身を表示する処理を呼び出す
         */
        print '<br>';
        /*
         * ショッピングカートの中身を確認する処理へのリンクを記述します。
         * Q. ”カートを見る”という文字列をクリックすると、shop_carlook.phpを呼び出す記述をします。
         */
        print '<a ？？？？？>カートを見る</a><br>';
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>

</body>
</html>