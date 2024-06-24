<link rel="stylesheet" href="style.css">

<?php

//DB接続

$dsn = 'mysql:host=mysql301.phy.lolipop.lan;dbname=LAA1584511-xabivx';
$user = 'LAA1584511';
$pass = '4J0Fuqy827GNBk9J';


try {
    $dbh = new PDO($dsn,$user,$pass);
    echo '<div class=connect>';
    echo '接続成功<br>';
    echo '<br>';
    echo '</div>';
} catch(PDOException $e) {
    echo '<div class=connect>';
    echo '接続失敗<br>'.$e -> getMessage();
    echo '</div>';
    exit;
}

?>