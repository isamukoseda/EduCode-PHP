<?php
    /*
     * ショッピングカートの中身をHTMLのテーブルを使って一覧表示する。
     * 一覧表示した内容に対して
     * 1) 購入数量の変更
     * 2) ショッピンカートに入れた商品の返却
     * を実現する
     * 
     * ショッピングカートは、ショッピングカートに入れる処理(shop_cartin.php)内で、
     * $_SESSION情報($_SESSION['cart'], $_SESSION['kazu'])を作成して実現し
     * ているので、この処理内でショッピングカートを作成はしない。
     * カート内に商品が入っていない場合（ショッピングカートの中身が空の場合）は、その
     * 旨を表示して商品一覧へ戻るリンクを表示する。
     * ショッピングカートに商品が入っている場合は、ショッピングカート($_SEESION['cart'])
     * の商品コードに一致する商品情報（商品名、商品画像、商品単価）をデータベースから
     * 取得して、全て表示する。
     */
    session_start();
    session_regenerate_id(true);

    require_once('../common/common.php');       // 共通処理定義を読み込む
    printShopHtmlHeader();                      // HTMLヘッダの表示
    printShopMemberName();                      // ショップメンバー名の表示
    
    try {
        
        /*
         * 既にショッピングカートが作られている場合に、既存のショッピングカートの情報を一時
         * 的に退避させる。
         * ショッピングカートから全ての商品を戻した場合に、空のセッション情報が残るので、
         * ショッピングカートに商品（コード）が入っているか確認するために、ショッピング
         * カートに入れられている商品コードの数（配列の大きさ）を取得する
         */
        if (isset($_SESSION['cart']) == true) {     // ショッピングカートが既に存在
            $cart = $_SESSION['cart'];              // 一時配列($cart[])に商品コード（セッション情報）を代入
            $kazu = $_SESSION['kazu'];              // 一時配列($kazu[])に購入数量（セッション情報）を代入
            $max = count($cart);                    // 保存されている商品コードの数をカウントする
        } else {
            $max = 0;                               // ショッピングカートが無い場合には、商品コードの数を0に設定
        }

        /*
         * ショッピングカートに商品が入っていない場合：
         * 商品が入っていない旨を表示し、商品一覧へのリンクを表示して処理を終了(exit)する
         */
        if ($max == 0) {
            print 'カートに商品が入っていません。<br>';
            print '<br>';
            print '<a href="shop_list.php">商品一覧へ戻る</a>';
            exit();
        }

        /*
         * MySQLへ接続する。
         * （MySQLへの接続処理を共通処理化したConnectDB関数を呼び出す）
         */
        $dbh = connectDB('shop', 'localhost', 'shopadmin', 'adminadmin');

        /*
         * ショッピングカートに入れられている商品コード全てについて、商品コードに一致する商品情報のレコートから、
         * 商品コード、商品名、単価、商品画像ファイル名を取得する
         */
        /*
         * $cart配列に設定されている全ての商品コードを取り出し、商品情報テーブルからショッピングカートに入れられている商品コードに一致する
         * レコードから、「商品コード」「商品名」「単価」「商品画像ファイル名」を取得して夫々の変数に格納する処理を記述します。
         *
         * Q1. $cart配列から全ての商品コードを取り出す処理を記述して下さい。
         * Q2. DBから取得した「商品コード」を配列($pro_name[])に代入する処理を記述して下さい。
         * Q3. DBから取得した「単価」を配列($pro_price[])に代入する処理を記述して下さい。
         * Q4. DBに画像ファイル名が設定されいたかどうか判断する処理を記述して下さい。
         * Q5. DBに画像ファイル名が設定されている場合にimgタグの内容を完成させ、画像データが表示されるように記述して下さい。
         */
        foreach (？？？？？) {                   // $cart配列の「キー」と「値（商品コード）」を全て取得するまでループする
            $sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[0] = $val;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);          // fetchの実行
            $pro_name[] = ？？？？？;                     // 商品名を配列($pro_name[])に代入
            $pro_price[] = ？？？？？;                   // 商品単価を配列($pro_price[])に代入
            if (？？？？？) {                      // 画像ファイル名が設定されてない場合は、imgタグは非表示
                $pro_gazou[] = '';
            } else {                                        // 画像ファイル名が設定されている場合は、imgタグを作成して画像を表示する
                $pro_gazou[] = '<img ？？？？？>';
            }
        }
        $dbh = null;
    } catch (Exception $e) {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>

    <br>
    カートの中身<br>
    <br>
    <form method="post" action="kazu_change.php">
    <table border="1">
        <tr>
            <td>商品</td>
            <td>商品画像</td>
            <td>価格</td>
            <td>数量</td>
            <td>小計</td>
            <td>削除</td>
        </tr>
        <?php
            for ($i = 0; $i < $max; $i++) {
        ?>
                <tr>
                    <td><?php print $pro_name[$i]; ?></td>
                    <td><?php print $pro_gazou[$i]; ?></td>
                    <td><?php print $pro_price[$i]; ?>円</td>
                    <td><input type="text" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>
                    <td><?php print $pro_price[$i] * $kazu[$i]; ?>円</td>
                    <td><input type="checkbox" name="sakujo<?php print $i; ?>"></td>
                </tr>
        <?php
            }
        ?>
    </table>
    <input type="hidden" name="max" value="<?php print $max; ?>">
    <input type="submit" value="数量変更"><br>
<!--        <input type="button" onclick="history.back()" value="戻る"> -->
    <A href="shop_list.php">商品一覧へもどる</A>
    </form>

</body>
</html>