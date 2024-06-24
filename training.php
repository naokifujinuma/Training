<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"/>


<?php
require_once 'connect.php';

try {
    // フォームからのデータを受け取る
    $set = $_POST['set'];
    $weight = $_POST['weight'];
    $number_of_times = $_POST['number_of_times'];
    $memo = $_POST['memo'];

    // データベースに追加(INSERT)
    $sql_insert = "INSERT INTO detail (`set`, weight, number_of_times, memo) VALUES(:set, :weight, :number_of_times, :memo)";
    $stmt_insert = $dbh->prepare($sql_insert);
    $stmt_insert->bindParam(':set', $set, PDO::PARAM_INT);
    $stmt_insert->bindParam(':weight', $weight, PDO::PARAM_INT);
    $stmt_insert->bindParam(':number_of_times', $number_of_times, PDO::PARAM_INT);
    $stmt_insert->bindParam(':memo', $memo, PDO::PARAM_STR);
    $stmt_insert->execute();

    // データの挿入が成功したかどうかをチェック
    if($stmt_insert) {
        echo '成功<br>';
    } else {
        echo '失敗<br>';
        exit;
    }

    // 追加後のテーブルを表示
    echo '<div class=training_add>';
    echo '追加された項目<br>';
    echo '</div>';
    $sql_select = "SELECT * FROM detail";
    $stmt_select = $dbh->prepare($sql_select);
    $stmt_select->execute();
    
    while($result = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class=t_wrap>';
            echo '<div class=training_wrap>';
            echo "セット数:" .$result['set'];
            echo "重さ:" .$result['weight'];
            echo "回数:" .$result['number_of_times'];
            echo "メモ:" .$result['memo'];
            echo '<br>';
            echo '</div>';
        echo '</div>';
    }

} catch(PDOException $e) {
    echo "失敗".$e->getMessage();
    exit;
}

?>
<div class="tap-wrap">
    <a href="training.html">戻る</a>
</div>



