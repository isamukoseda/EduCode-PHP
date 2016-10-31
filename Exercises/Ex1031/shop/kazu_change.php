<?php
    /*
     * 購入数量の変更を実現する
     * 
     * 
     */
    session_start();
    session_regenerate_id(true);

    var_dump($_POST);
    //$post = sanitize($_POST);
    
    /*
     * 購入数量が変更された場合の処理
     * 
     * ショッピングカートに入れられている商品の数($max)をセッション情報から取得し、
     * 購入数量として、数字が指定されていて且つ1から10までが指定されているかをチェックする。
     * 更に、前ページで「削除」がチェックされている配列はarray_spliceで削除することで、
     * カートからの取り出しを実現する。
     */
    $max = $_POST['max'];
    for ($i = 0; $i < $max; $i++) {
        if (preg_match("/^[0-9]+$/", $_POST['kazu' . $i]) == 0) {
            print '数量に誤りがあります。';
            print '<a href="shop_cartlook.php">カートに戻る</a>';
            exit();
        }
        if ($_POST['kazu' . $i] < 1 || 10 < $_POST['kazu' . $i]) {
            print '数量は必ず1個以上、10個までです。';
            print '<a href="shop_cartlook.php">カートに戻る</a>';
            exit();
        }
        $kazu[] = $_POST['kazu' . $i];
    }

    /*
     * 「削除」がチェックされた場合の処理
     * 
     * 「削除」がチェックされた場合の例）
     * 　["sakujyo1"]=>string(2) "on"
     * 削除対象の入れるには、"on"が指定されている。削除対象外の配列には何も設定されていない
     * ので、isset()で削除対象の判定が可能
     */
    $cart = $_SESSION['cart'];
    for ($i = $max; 0 <= $i; $i--) {
        if (isset($_POST['sakujo' . $i]) == true) {
            array_splice($cart, $i, 1);
            array_splice($kazu, $i, 1);
        }
    }
    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;

    header('Location:shop_cartlook.php');
?>