<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatwork メッセージ取得</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Chatwork メッセージ取得</h2>
    <form action="{{ route('chatwork.roominfo') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="room_id" class="form-label">ルームID:</label>
            <input type="text" id="room_id" name="room_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">取得</button>
    </form>

    @if (isset($messages))
        <h3 class="mt-4">メッセージ一覧</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>送信者</th>
                    <th>メッセージ</th>
                    <th>送信日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message['account']['name'] }}</td>
                        <td>{!! nl2br(e($message['body'])) !!}</td>
                        <td>{{ date('Y-m-d H:i:s', $message['send_time']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif (isset($error))
        <div class="alert alert-danger mt-3">{{ $error }}</div>
    @endif
</body>
</html>
