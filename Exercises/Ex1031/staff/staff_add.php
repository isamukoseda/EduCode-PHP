<?php
    // 共通処理の読み込み
    require_once('../common/common.php');       // 共通処理定義を読み込む
    sessionCheck();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>まるまるショップ</title>
    </head>
    <body>
        <!-- スタッフ追加フォームの本文 -->
        スタッフ追加<br>
        <br>
        
        <!-- formタグでsubmitした先をstaff_add_check.php（スタッフ追加チェック）に指定する -->
        <form method="post" action="staff_add_check.php">
            
            <!-- スタッフ名とパスワードをinputタグで入力する -->
            スタッフ名を入力してください。<br>
            <input type="text" name="name" style="width:200px"><br>
            パスワードを入力してください。<br>
            <input type="password" name="pass" style="width:100px"><br>
            パスワードをもう１度入力してください。<br>
            <input type="password" name="pass2" style="width:100px"><br>
            <br>
            
            <!-- 戻るボタンとSubmitボタンを配置 -->
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="ＯＫ">
        </form>

    </body>
</html>