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
        <form action="{{route('gbiz.detail')}}" method="POST">
            @csrf
            <table>
                <tr>
                    <th>No</th>
                    <th>検索した会社名</th>
                    <th>検索結果</th>
                    <th>詳細</th>
                    <th>検索日時</th>
                </tr>
                @foreach($list as $value)
                    <tr>
                    @foreach($value as $key => $val)
                        @if($key === 'result')
                            <td>
                                <input type="hidden" name="result" value="{{$val}}">
                                <button type="submit">詳細</button>
                            </td>
                        @else
                            <td>{{$val}}</td>
                        @endif
                    @endforeach
                    </tr>
                @endforeach
            </table>
        </form>
    </body>
</html>
