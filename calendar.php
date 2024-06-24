<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>筋トレMemo カレンダー</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"/>
</head>
<body>

    <main>
        <div class="calendar-container">
            <?php
            echo '<div class=calendar-wrap>';
                //現在の年と月を取得
                $year = date('Y');
                $month = date('n');
                //月初の曜日と月の日数を取得
                $firstDayOfWeek = date('w', mktime(0, 0, 0, $month, 1, $year));
                $lastDayOfMonth = date('t', mktime(0, 0, 0, $month, 1, $year));

                //カレンダー表を作成
                echo '<table>';
                echo '<caption>'.$year.'年'.$month.'月</caption>';
                echo '<tr><th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th></tr>';

                //月初の曜日までの空白のセルを埋める
                echo '<tr>';
                for($i = 0; $i < $firstDayOfWeek; $i++) {
                    echo '<td></td>';  //月の最終日を過ぎた場合は空白のセルを表示
                }

                //日付を表示
                $dayOfMonth = 1;
                while($dayOfMonth <= $lastDayOfMonth) {
                    for($i = $firstDayOfWeek; $i < 7; $i++) {
                        if($dayOfMonth > $lastDayOfMonth) {
                            echo '<td></td>';
                        } else { 
                            echo '<td><a href="event_form.php?year=' . $year . '&month=' . $month . '&day=' . $dayOfMonth . '">' . $dayOfMonth . '</a></td>';   //日付を表示
                            $dayOfMonth++;
                        }
                    }
                    echo '</>';
                    if($dayOfMonth <= $lastDayOfMonth) {
                        echo '<tr>';
                    }
                    $firstDayOfWeek = 0;    //次の行からは月初目の曜日は常に日曜日（０）とする
                }
                echo '</table>';
            echo '</div>';
            ?>
        </div>
    </main>

    <footer>
        <a href="index.html">
            <img src="symbol060.png" alt="home">
        </a>
    </footer>
</body>
</html>