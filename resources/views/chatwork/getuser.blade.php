<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatwork ルームメンバー取得</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Chatwork ルームメンバー取得</h2>
    <form action="{{ route('chatwork.getuser') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="room_id" class="form-label">ルームID:</label>
            <input type="text" id="room_id" name="room_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">取得</button>
    </form>

    @if (isset($members))
        <h3 class="mt-4">メンバー一覧</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>Chatwork ID</th>
                    <th>役割</th>
                    <th>部署</th>
                    <th>アバター</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member['name'] }}</td>
                        <td>{{ $member['chatwork_id'] }}</td>
                        <td>{{ $member['role'] }}</td>
                        <td>{{ $member['department'] ?? 'N/A' }}</td>
                        <td><img src="{{ $member['avatar_image_url'] }}" alt="Avatar" width="50"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif (isset($error))
        <div class="alert alert-danger mt-3">{{ $error }}</div>
    @endif
</body>
</html>
