<!DOCTYPE html>
<HTML>
    <HEAD>
        <META charset="UTF-8">
        <TITLE>まるまるショップ</TITLE>
    </HEAD>
    <BODY>

        <!-- PHP文の開始 -->
        <?php
        
        // POSTで渡されている全てのデータをブラウザに表示して確認する。(DEBUG)
        //var_dump($_POST);
        //print '<br><br>';

        // 連想配列となっている$_POST配列から、'name'と'price'キーの内容を取得して、それぞれ変数に格納する
        $pro_name = $_POST['name'];
        $pro_price = $_POST['price'];

        //$pro_name=htmlspecialchars($pro_name);
        //$pro_price=htmlspecialchars($pro_price);

        // 商品名が入力されているかを確認する
        if ($pro_name == '') {
            print '商品名が入力されていません。<br>';
        } else {
            print '商品名:';
            print $pro_name;
            print '<br>';
        }

        // 価格が半角数字のみで入力されているかを確認する
        if (preg_match('/^[0-9]+$/', $pro_price) == 0) {
            print '価格をきちんと入力してください。<br>';
        } else {
            print '価格:';
            print $pro_price;
            print '円<br>';
        }

        // 商品名または価格が正しく入力されているかによって、処理を分岐する
        if ($pro_name == '' || preg_match('/^[0-9]+$/', $pro_price) == 0) {
            // 商品名または価格が正しく入力されていない場合には、戻るボタンのみを表示する
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        } else {
            // 両方が正しく入力されている場合には、formタグの飛び先をproduct_add_done.phpに指定する。
            print '上記の商品を追加します。<br>';
            print '<form method="post" action="product_add_done.php">';
            // name変数とprice変数を非常時項目として設定する
            print '<input type="hidden" name="name" value="' . $pro_name . '">';
            print '<input type="hidden" name="price" value="' . $pro_price . '">';
            print '<br>';
            // 戻るボタンとsubmitボタンを表示する
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="ＯＫ">';
            print '</form>';
        }
        
        ?>
        <!-- PHP文の終了　-->
    </BODY>
</HTML>