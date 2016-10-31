<?php
    // 共通処理の読み込み
    require_once('../common/common.php');       // 共通処理定義を読み込む
    sessionCheck();

    // スタッフ表示(disp)が選択された場合には、staff_disp.phpに移動
    if (isset($_POST['disp']) == true) {
        if (isset($_POST['staffcode']) == false) {
            header('Location:staff_ng.php');
            exit();
        }
        $staff_code = $_POST['staffcode'];
        header('Location:staff_disp.php?staffcode=' . $staff_code);
        exit();
    }

    // スタッフ追加(add)が選択された場合には、staff_add.phpに移動
    if (isset($_POST['add']) == true) {
        header('Location:staff_add.php');
        exit();
    }

    /*
     * 
     */
    // スタッフ情報修正(edit)が選択された場合には、staff_edit.phpに移動
    if (isset($_POST['edit']) == true) {
        if (isset($_POST['staffcode']) == false) {
            header('Location:staff_ng.php');
            exit();
        }
        $staff_code = $_POST['staffcode'];
        header('Location:staff_edit.php?staffcode=' . $staff_code);
        exit();
    }

    // スタッフ削除(delete)が選択された場合には、staff_delete.phpに移動
    if (isset($_POST['delete']) == true) {
        if (isset($_POST['staffcode']) == false) {
            header('Location:staff_ng.php');
            exit();
        }
        $staff_code = $_POST['staffcode'];
        header('Location:staff_delete.php?staffcode=' . $staff_code);
        exit();
    }
    /*
     * 
     */
    
?>