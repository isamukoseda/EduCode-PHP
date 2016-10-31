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

    <!-- PHP文の開始 -->
    <?php
    
    // 連想配列となっている$_POST配列から、'name'と'pass','pass2'キーの内容を取得して、それぞれ変数に格納する
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass2 = $_POST['pass2'];

    //$staff_name = htmlspecialchars($staff_name);
    //$staff_pass = htmlspecialchars($staff_pass);
    //$staff_pass2 = htmlspecialchars($staff_pass2);

    // スタッフ名が入力されているかを確認する
    if ($staff_name == '') {
        print 'スタッフ名が入力されていません。<br>';
    } else {
        print 'スタッフ名：';
        print $staff_name;
        print '<br>';
    }

    // パスワードが入力されているかを確認する
    if ($staff_pass == '') {
        print 'パスワードが入力されていません。<br>';
    }

    // 確認用のパスワードが一致しない場合
    if ($staff_pass != $staff_pass2) {
        print 'パスワードが一致しません。<br>';
    }

    // スタッフ名またはパスワードが正しく入力されているかによって処理を分岐する
    if ($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2) {
        // スタッフ名またはパスワードが入力されていないか、確認用のパスワードが一致しない場合には、戻るボタンのみを表示する
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
    } else {
        // 正しく入力されている場合には、formタグのactionをstaff_add_done.phpに指定する
        $staff_pass = md5($staff_pass);                                         // パスワードをMD5でハッシュ化する
        print '<form method="post" action="staff_add_done.php">';
        print '<input type="hidden" name="name" value="' . $staff_name . '">';
        print '<input type="hidden" name="pass" value="' . $staff_pass . '">';
        print '<br>';
        
        // 戻るとSubmitボタンを表示する
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '<input type="submit" value="ＯＫ">';
        print '</form>';
    }
    ?>

    </body>
</html>