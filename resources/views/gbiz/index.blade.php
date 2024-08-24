<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>gbiz</title>
    </head>
    <script>
    </script>
    <body>
        <form action="{{route('gbiz.redirect')}}" method="POST">
            @csrf
            <p>調べたい法人名を記載してください</p>
            <label>法人名：<input type="text" name="name"></label>
            <button type='submit' id='gbiz'>法人情報検索</button>
        </form>
        <?php if($res !== ''){
            // 不要な部分を削除し、JSON部分のみを抽出
            $jsonString = substr($res, strpos($res, '{'));
            // JSON文字列をPHPの配列に変換
            $data = json_decode($jsonString, true);
            foreach($data['hojin-infos'] as $value){
                foreach($value as $key => $val){
                    echo $key . ':' . $val . '<br>';
                }
            }
        }?>

        
    </body>
</html>
