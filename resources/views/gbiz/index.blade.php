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
        <form action="{{route('gbiz.list')}}" method="POST">
            @csrf
            <button type='submit' id='gbizlist'>検索結果一覧</button>
        </form>
        @if($data !== '' && isset($data["hojin-infos"]))
            @foreach($data["hojin-infos"] as $value)
                @foreach($value as $key => $val)
                    <p>{{$key}} : {{$val}}<br></p>
                @endforeach
            @endforeach
        @else
            <p>検索結果がありません。</p>
        @endif
    </body>
</html>
