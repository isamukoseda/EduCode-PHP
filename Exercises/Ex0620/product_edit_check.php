<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>まるまるショップ</title>
    </head>
    <body>
        
        <!-- PHP文の開始 -->
        <?php
        //var_dump($_POST);
        //print '<br><br>';
        //var_dump($_FILES);
        //print '<br><br>';
        
        // 連想配列となっている$_POST配列から、'code','name'と'price'キーの内容を取得して、それぞれ変数に格納する
        $pro_code = $_POST['code'];         // 商品コードを変数($pro_code)に代入する
        $pro_name = $_POST['name'];         // 商品名を変数($pro_name)に代入する
        $pro_price = $_POST['price'];       // 価格を変数($pro_price)に代入する

        //$pro_code=htmlspecialchars($pro_code);
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
        if ($pro_name == '' || preg_match('/^[0-9]+$/', $pro_price) == 0 || $pro_gazou['size'] > 1000000) {
            // 商品名または価格が正しく入力されていない場合には、戻るボタンのみを表示する
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        } else {
            // 両方が正しく入力されている場合には、formタグの飛び先をproduct_edit_done.phpに指定する
            print '上記のように変更します。<br>';
            print '<form method="post" action="product_edit_done.php">';
            
            // 商品コード、商品名、価格を非表示項目(hidden)とする
            print '<input type="hidden" name="code" value="' . $pro_code . '">';
            print '<input type="hidden" name="name" value="' . $pro_name . '">';
            print '<input type="hidden" name="price" value="' . $pro_price . '">';
            print '<input type="hidden" name="gazou_name_old" value="' . $pro_gazou_name_old. '">';
            print '<input type="hidden" name="gazou_name" value="' . $pro_gazou['name']. '">';
            print '<br>';
            
            // 戻るボタンとsubmitボタンを表示する
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="ＯＫ">';
            print '</form>';
        }
        ?>
    </body>
</html>