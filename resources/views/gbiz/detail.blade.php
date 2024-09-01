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
        <p>詳細</p>
        <form action="{{route('gbiz.list')}}" method="POST">
        @csrf
            <?php var_dump($detail);?>
            <button type="submit">検索結果へ</button>
        </form>
    </body>
</html>
