

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>種目を選択</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="main-container">
            <div>
                <h1>筋トレMemo</h1>
            </div>
            <div>
                <?php
                $year = $_GET['year'];
                $month = $_GET['month'];
                $day = $_GET['day'];

                echo '<div class=date>';
                echo $year."年".$month."月".$day."日";
                echo '</div>';
                ?>
            </div>
            <div class="event_form_container">
                <form action="event.php" method="post" class="event_form">
                    <div class="event_form_wrap">
                        <label>部位</label>
                        <input type="text" name="part"><br>
                        <label>種目</label>
                        <input type="text" name="event"><br>
                        <input type="submit" value="追加" class="submit-btn">
                    </div>
                </form>
            </div>
            <div class="tap-wrap">
                <a href="calendar.php">←カレンダーへ戻る</a>
            </div>
        </div>
    </main>
    
    <footer>
        <a href="index.html">
            <img src="symbol060.png" alt="home">
        </a>
    </footer>
</body>
</html>