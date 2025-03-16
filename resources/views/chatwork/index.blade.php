<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatwork メッセージ送信</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Chatwork メッセージ送信</h2>
    <form action="{{ route('chatwork.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="room_id" class="form-label">ルームID:</label>
            <input type="text" id="room_id" name="room_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">メッセージ:</label>
            <textarea id="message" name="message" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
    </form>
</body>
</html>
