<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>chatwork</title>
    </head>
    <script>
    </script>
    <body>
        <form action="{{route('chatwork.send')}}" method="POST">
            @csrf
            <p>chatworkへメッセージ送信</p>
            <button type='submit' id='chatwork'>メッセージ送信</button>
        </form>
    </body>
</html>
