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
        <p>りすと</p>
        <table>
            <tr>
                <th>No</th>
                <th>検索した会社名</th>
                <th>検索結果</th>
                <th>詳細</th>
                <th>検索日時</th>
            </tr>
            @foreach($list as $value)
                @foreach($value as $key => $val)
                    @if($key === 'result')
                        <td><a href="{{route('gbiz.detail')}}">詳細</a></td>
                    @else
                        <td>{{$val}}</td>
                    @endif
                @endforeach
            @endforeach
        </table>
    </body>
</html>
