<?php
$id = $_GET["id"];
//echo $id; // 表示の確認
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch(); //ループで回して変数に入れる

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_list_view.php">ユーザーリスト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_update.php">
  <div class="jumbotron">
   <fieldset>

    <legend>更新：ユーザーリスト</legend>
     <label>ユーザー名：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>ID：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     <label>パスワード：<input type="text" name="lpw" value="<?=$row["lpw"]?>"></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
