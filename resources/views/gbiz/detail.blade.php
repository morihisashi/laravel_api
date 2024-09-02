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
            <table>
                <tr>
                    <th>会社名</th>
                    <th>ステータス</th>
                    <th>住所</th>
                    <th>法人番号</th>
                </tr>
                @foreach($detail as $value)
                    <tr>
                        @foreach($value as $key => $val)
                            @if($key === "name" OR $key === "status" OR $key === "location" OR $key === "corporate_number")
                                <td>{{$val}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </table>
            <button type="submit">検索結果へ</button>
        </form>
    </body>
</html>
