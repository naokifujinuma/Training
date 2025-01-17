
//タイマーを格納する変数の宣言
var timer1;

//カウントダウン関数を1000ミリ毎秒に呼び出す関数
function cntStart() {
    document.timer.elements[2].disabled = true;
    timer1 = setInterval("countDown()", 1000);
}

//タイマー停止関数
function cntStop() {
    document.timer.elements[2].disabled = false;
    clearInterval(timer1);
}

//カウントダウン関数
function countDown() {
    var min = document.timer.elements[0].value;
    var sec = document.timer.elements[1].value;

    if((min == "") && (sec == "")) {
        alert("時間を設定してください");
        reSet();
    } else {
        if(min == "") min = 0;
        min = parseInt(min);

        if(sec == "") sec = 0;
        sec = parseInt(sec);

        tmWrite(min*60+sec-1);

        }
    }

//残り時間を書き出す関数
function tmWrite(int) {
    int = parseInt(int);
    if(int <= 0) {
        reSet();
        alert("時間です");
    } else {
        //残り分数はintを６０で割って切り捨てる
        document.timer.elements[0].value = Math.floor(int/60);
        //残り秒数はintを６０で割った余り
        document.timer.elements[1].value = int % 60;
    }
    
}

//初期値に戻すリセット関数
function reSet() {
    document.timer.elements[0].value="0";
    document.timer.elements[1].value="0";
    document.timer.elements[2].disabled=false;
    clearInterval(timer1);
}

