

<?php

require_once 'connect.php';

//入力フォームデータを格納
$EventID = $_POST['EventID'];
$EventName = $_POST['EventName'];
$part = $_POST['part'];
$UserID = $_POST['UserID'];

$sql = "INSERT INTO event(EventID,EventName,part,UserID) VALUES('$EventID','$EventName','$part','$UserID')";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

if($stmt) {
    echo 'データの追加が正常に終了しました';
} else {
    echo 'データの追加に失敗しました';
    exit;
}

require_once 'template.php';

?>