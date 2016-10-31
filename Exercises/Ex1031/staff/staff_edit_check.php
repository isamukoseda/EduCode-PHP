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

<?php
    // セッションの開始
    // session_start();
    // session_regenerate_id(true);
    
    // ログイン状況のチェックを実施
    /*
    if (isset($_SESSION['login']) == false) {
        print 'ログインされていません。<br>';
        print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
        exit();
    } else {
        print $_SESSION['staff_name'];
        print 'さんログイン中<br>';
        print '<br>';
    }
    */

    // 共通処理の読み込みと共通ヘッダ情報の表示
    // require_once('../common/common.php');       // 共通処理定義を読み込む
    // printShopHtmlHeader();                      // HTMLヘッダの表示

    // スタッフコード、スタッフ名、パスワードを取得して夫々変数に代入する
    $staff_code = $_POST['code'];
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass2 = $_POST['pass2'];

    //$staff_name = htmlspecialchars($staff_name);
    //$staff_pass = htmlspecialchars($staff_pass);
    //$staff_pass2 = htmlspecialchars($staff_pass2);

    // スタッフ名入力チェック処理
    if ($staff_name == '') {
        print 'スタッフ名が入力されていません。<br>';
    } else {
        print 'スタッフ名：';
        print $staff_name;
        print '<br>';
    }

    // パスワード入力チェック処理
    if ($staff_pass == '') {
        print 'パスワードが入力されていません。<br>';
    }

    // 確認用パスワードチェック処理
    if ($staff_pass != $staff_pass2) {
        print 'パスワードが一致しません。<br>';
    }
    
    // スタッフ名が重複していないかチェックする？
    // SELECT * FROM staff_stable WHERE NAME=$staff_name AND ID=$staff_code;

    // スタッフ名またはパスワードが正しく入力されているかによって、処理を分岐する
    if ($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2) {
        // 不正な状態の場合には、戻るボタンのみを表示する
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
    } else {
        // 正しく入力されている場合には、formタグのactionをstaff_edit_done.phpに設定する

        // パスワードをMD5のハッシュ値に変換する
        $staff_pass = md5($staff_pass);
        print '<form method="post" action="staff_edit_done.php">';
        print '<input type="hidden" name="code" value="' . $staff_code . '">';
        print '<input type="hidden" name="name" value="' . $staff_name . '">';
        print '<input type="hidden" name="pass" value="' . $staff_pass . '">';
        print '<br>';
            
        // 戻るボタンとsubmitボタンを表示する
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '<input type="submit" value="ＯＫ">';
        print '</form>';
    }
?>
<!-- PHP文の終了 -->

    </body>
</html>