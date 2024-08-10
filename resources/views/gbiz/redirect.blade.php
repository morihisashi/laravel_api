<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>gbiz</title>
    </head>
    <script>
        console.log('こんにちは');
        // ボタンのクリックイベントを設定
        function gbiz() {
            // ランダムな整数を生成
            let randomNumber = getRandomInt(1, 100);
            console.log(randomNumber);
        }

        function getRandomInt(minval, maxval){
            let min = Math.ceil(minval);
            let max = Math.floor(maxval);
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    </script>
    <body>
        <form action="{{ route('gbiz.redirect') }}" method="POST">
        @csrf
            <label>法人番号：<input type="text" name="corporate_number"></label>
            <label>法人名：<input type="text" name="name"></label>
            <button type='submit' id='gbiz' onclick="gbiz()">法人情報検索</button>
        </form>
        <?php var_dump($res); echo 123;?>
    </body>
</html>
