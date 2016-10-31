<?php

    // 商品表示(disp)が選択された場合には、product_disp.phpに移動
    if (isset($_POST['disp']) == true) {
        if (isset($_POST['pcode']) == false) {
            header('Location:product_ng.php');
            exit();
        }
        $pro_code = $_POST['pcode'];
        header('Location:product_disp.php?pcode=' . $pro_code);
        exit();
    }

    // 商品追加(add)が選択された場合には、product_add.phpに移動
    if (isset($_POST['add']) == true) {
        header('Location:product_add.php');
        exit();
    }

    // 商品情報修正(edit)が選択された場合には、product_edit.phpに移動
    if (isset($_POST['edit']) == true) {
        // 商品コード('pcode')が設定されているかを確認する
        if (isset($_POST['pcode']) == false) {        // 設定されていない場合
            header('Location:product_ng.php');          /// product_ng.phpに飛ぶ
            exit();
        }
        $pro_code = $_POST['pcode'];
        header('Location:product_edit.php?pcode=' . $pro_code);   // 商品コードをGETのパラメータとして設定して、product_edit.phpに飛ぶ
        exit();
    }

    // 商品削除（delete）が選択された場合には、product_delete.phpに移動
    if (isset($_POST['delete']) == true) {
        if (isset($_POST['pcode']) == false) {
            header('Location:product_ng.php');
            exit();
        }
        $pro_code = $_POST['pcode'];
        header('Location:product_delete.php?pcode=' . $pro_code);
        exit();
    }

?>
