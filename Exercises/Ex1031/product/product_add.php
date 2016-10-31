<!DOCTYPE html>
<HTML>
    <HEAD>
        <META charset="UTF-8">
        <TITLE>まるまるショップ</TITLE>
    </HEAD>
    <BODY>
        <!-- 商品追加フォームの本文 -->
        商品追加<br>
        <br>
        
        <!-- formタグでsubmitした先をprduct_add_check.php（商品追加チェック）に指定する -->
        <form method="post" action="product_add_check.php" enctype="multipart/form-data">
            
            <!-- 商品名と価格をinputタグのtextフィールドに入力する -->
            商品名を入力してください。<br>
            <input type="text" name="name" style="width:200px"><br>
            価格を入力してください。<br>
            <input type="text" name="price" style="width:50px"><br>
            画像を選んでください。<br />
            <input type="file" name="gazou" style="width:400px"><br>
            <br>
            
            <!-- 戻るボタンとSubmitボタンを配置 -->
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="ＯＫ">
        </form>

    </BODY>
</HTML>