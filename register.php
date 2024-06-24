
<link rel="stylesheet" href="style.css">

<?php

session_start();

require_once 'connect.php';

//フォームから送られてきたデータの取得
$username = $_POST['username'];
$password = $_POST['password'];

//ユーザーがすでに存在するかチェック
$sql_check = "SELECT * FROM user WHERE name = :username";
$stmt_check = $dbh->prepare($sql_check);
$stmt_check->bindParam(':username', $username);
$stmt_check->execute();
$user_check = $stmt_check->fetch(PDO::FETCH_ASSOC);

if($user_check) {
    echo "<div class=check>";
    echo "おかえりなさい";
    echo "</div>";
    exit();
}

//新しいユーザーをデータベースに登録
try {
    $sql_register = "INSERT INTO user (name, password) VALUES (:username, :password)";
    $stmt_register = $dbh->prepare($sql_register);
    $stmt_register->bindParam(':username', $username);
    $stmt_register->bindParam(':password', $password);
    $stmt_register->execute();

    if($stmt_register->rowCount() > 0) {
        $_SESSION['username'] = $username;
        echo "<div class=ok>";
        echo "登録完了";
        echo "</div>";

        // ユーザーが登録された場合のみ<a>タグを表示
        echo '<div class="tap-wrap">';
        echo '<a href="index.html">ホーム画面へ</a>';
        echo '</div>';
    } else {
        echo "<div class=no>";
        echo "登録に失敗しました";
        echo "</div>";
    }
} catch(PDOException $e) {
    echo "<div class=error>";
    echo "エラー発生".$e->getMessage();
    echo "</div>";
}

?>
