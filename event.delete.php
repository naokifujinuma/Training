

<?php
require_once 'connect.php';

//postリクエストが送信された場合のみ処理を実行
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $EventID = $_POST['EventID'];  //イベントIDを取得し変数へ
    $sql = "DELETE FROM event WHERE id = :EventID";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':EventID', $EventID, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: index.php");  //削除成功した場合、リダイレクトして再度表示
    exit();
} else {
    echo "エラー 不正なリクエストです";
}




?>