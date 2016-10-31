<?php
    /*
     * 商品一覧で選択した商品の詳細を表示して、「ショッピングカートに入れる処理」への
     * リンクを表示する。
     * 
     * 商品一覧で選択した商品は、GETのパラメータとして商品コード(procode)が渡されます。
     * 渡された商品コードをキーに商品名、価格、商品画像名を取得し、商品の詳細としてそれぞれ
     * の内容を表示します。
     * ショッピングカートに入れる処理をGETで呼び出し、パラメータとして商品コード(procode)
     * を渡すようにします。
     * 
     */
    session_start();
    session_regenerate_id(true);

    require_once('../common/common.php');       // 共通処理定義を読み込む
    printShopHtmlHeader();                      // HTMLヘッダの表示
    printShopMemberName();                      // ショップメンバー名の表示

    try {

        $pro_code = $_GET['procode'];

        /*
         * MySQLへ接続する。
         * （MySQLへの接続処理を共通処理化したConnectDB関数を呼び出す）
         */
        $dbh = connectDB('shop', 'localhost', 'shopadmin', 'adminadmin');

        /*
         * 商品テーブルから商品名、価格と商品画像名を取得する
         */
        $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $pro_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);  // fetchを実行
        $pro_name = $rec['name'];               // 商品名を取得
        $pro_price = $rec['price'];             // 商品単価を取得
        $pro_gazou_name = $rec['gazou'];        // 商品画像ファイル名を取得

        $dbh = null;

        /*
         * 商品画像名を取得できた場合には、imgタグを使って該当の商品画像を表示るHTML文を構成する
         */
        if ($pro_gazou_name == '') {
            $disp_gazou = '';                   // 画像ファイルが指定されていないので、imgタグはなし
        } else {
            $disp_gazou = '<img src="../product/gazou/' . $pro_gazou_name . '">';
        }
        
        /*
         * カートに入れる処理(shop_cartin.php)処理を呼び出す
         */
        print '<a href="shop_cartin.php?procode=' . $pro_code . '">カートに入れる</a><br><br>';
    } catch (Exception $e) {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>

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
    <br>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>

</body>
</html>