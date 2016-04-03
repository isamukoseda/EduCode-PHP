<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>まるまるショップ</title>
    </head>
    <body>
        <!- PHP分の開始 ->
        <?php
        // 連想配列となっている$_POST配列から、'name'と'price'キーの内容を取得して、それぞれ変数に格納する
        $pro_name = $_POST['name'];
        $pro_price = $_POST['price'];
        
        // 商品名が入力されているか確認する
        if($pro_name==''){
            print '商品名が入力されていません。<br>';
        } else {
            print '商品名：';
            print $pro_name;
            print '<br>';
        }

        // 価格が半角数字のみで入力されているか確認する
        if(preg_match('/^[0-9]+$/', $pro_price)==0){
            print '価格を正確にと入力して下さい<br>';
        } else {
            print '価格：';
            print $pro_price;
            print '円<br>';
        }
        
        // 商品名と価格が正しく入力されていない場合と正しく入力されている場合で処理を分岐させる
        if($pro_name=='' || preg_match('/^[0-9]+$/', $pro_price)==0){
            //商品名または価格が正しく入力されていない場合には、戻るボタンのみを表示する
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る"/>';
            print '</form>';
        } else {
            // 商品名と価格が正しく入力されている場合には、formタグのアクション先をproduct_add_done.phpに指定する
            print '上記の商品を商品データに追加します<br>';
            print '<form method="post" action="product_add_done.php">';
            
            // 商品名（$pro_name）と価格（$pro_price）を非表示項目として設定する
            print '<input type="hidden" name="name" value="'.$pro_name.'"/>';
            print '<input type="hidden" name="price" value="'.$pro_price.'"/>';
            print '<br>';
            
            // 戻るボタンとsubmitボタンを表示する
            print '<input type="button" onclick="history.back()" value="戻る"/>';
            print '<input type="submit" value="OK"/>';
            print '</form>';
        }
        ?>
        <!- PHP文の終了 ->
    </body>
</html>