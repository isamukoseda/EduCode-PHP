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

    try {

        // スタッフコードを取得して変数($staff_code)に代入する
        $staff_code = $_GET['staffcode'];

        // MySQLに接続する
        $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
        $user = 'shopadmin';
        $password = 'AdminPassword';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // mst_staffテーブルから、スタッフコードに一致するレコードを特定して、スタッフ名を取得する
        $sql = 'SELECT name FROM shop_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt->execute($data);

        // SQL文を実行してスタッフ名を変数($staff_name)に代入する
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec['name'];

        // MySQLの接続を切断する
        $dbh = null;
    } catch (Exception $e) {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>
<!-- PHP文の終了 -->

        <!-- スタッフ修正フォームの本文 -->
        スタッフ修正<br>
        <br>
        スタッフコード<br>
        <?php print $staff_code; ?>
        <br>
        <br>
        
        <!-- formタグでsubmitした先をstaff_edit_check.php（スタッフ修正チェック）に指定する -->
        <form method="post" action="staff_edit_check.php">
            <input type="hidden"name="code" value="<?php print $staff_code; ?>">
            スタッフ名<br>
            <input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br>
            パスワードを入力してください。<br>
            <input type="password" name="pass" style="width:100px"><br>
            パスワードをもう1度入力してください。<br>
            <input type="password" name="pass2" style="width:100px"><br>
            <br>
            
            <!-- 戻るボタンとSubmitボタンを配置する -->
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="ＯＫ">
        </form>

    </body>
</html>