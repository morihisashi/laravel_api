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
        <?php if($data !== ''){
            foreach($data['hojin-infos'] as $value){
                foreach($value as $key => $val){
                    echo $key . ':' . $val . '<br>';
                }
            }
        }?>

        
    </body>
</html>
