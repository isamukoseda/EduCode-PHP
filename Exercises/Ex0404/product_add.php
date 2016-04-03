<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>まるまるショップ</title>
    </head>
    <body>
        <!- 商品追加フォームの本文 ->
        商品追加<br><br>
            
        <!- formタグでsubmitした先をproduct_add_check.php（商品追加チェック処理）に指定する ->
        <form method="post" action="product_add_check.php">
            
            <!- 商品名と価格をinputタグのtextフィールドに入力する ->
            商品名を入力してください<br>
            <input type="text" name="name" style="width:200px"/><br>
            価格を入力してください<br>
            <input type="text" name="price" style="width:50px"/><br>
            <br>
            
            <!- 戻るボタンとSubmitボタンを配置 ->
            <input type="button" onclick="history.back()" value="戻る" style="width:30px"/>
            <input type="submit" value="OK"/>
        </form>
    </body>
</html>