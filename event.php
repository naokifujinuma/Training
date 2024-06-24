<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"/>

<?php
require_once 'connect.php';

// POSTリクエストが送信された場合のみ処理を実行
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 格納
    $part = $_POST['part'];
    $event = $_POST['event'];

    // SQLインジェクションを防止するため、プリペアドステートメントを使用してSQLクエリを実行
    $sql = "INSERT INTO event(part, event) VALUES(:part, :event)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':part', $part, PDO::PARAM_STR);
    $stmt->bindParam(':event', $event, PDO::PARAM_STR);
    $stmt->execute();
}

//削除ボタンがクリックされた時の処理
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_post['delete']; //削除するid
    $sql = "DELETE FROM event WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

    // 追加後のテーブルを表示
    echo '<div class=event_add>';
    echo '追加された項目<br>';
    echo '</div>';
    $sql = "SELECT * FROM event";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class=event_wrap>';
        echo '<br>';
        echo "部位:" .$result['part'];
        echo "種目:" .$result['event'];
        echo '<form method="post" action="event.php">';
        echo '<input type="hidden" name="event_id" value="' . $result['id'] . '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '<br>';
        echo '</div>';        
    }
?>

<div class="tap-wrap">
    <a href="training.html">トレーニング画面へ</a>
</div>