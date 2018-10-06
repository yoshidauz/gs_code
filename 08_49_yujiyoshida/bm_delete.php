<?php
// idをリンクから取得する
$id = $_GET["id"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "DELETE FROM gs_bm_table WHERE id=:id"; //DELITE FORM テーブル名 カラム
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．select.phpへリダイレクト
    header("Location: bm_list_view.php");
    exit;
}

?>
