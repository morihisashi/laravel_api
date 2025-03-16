<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatworkController extends Controller
{
    public function index()
    {
        return view('chatwork.index');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'message' => 'required',
        ]);

        $roomId = $request->input('room_id');
        $message = $request->input('message');
        $apiToken = env('CHATWORK_API_TOKEN'); // .envからAPIトークンを取得

        // Chatwork APIにメッセージを送信
        $response = Http::withHeaders([
            'X-ChatWorkToken' => $apiToken
        ])->asForm()->post("https://api.chatwork.com/v2/rooms/{$roomId}/messages", [
            'body' => $message
        ]);

        // レスポンスを取得して表示
        if ($response->successful()) {
            return back()->with('success', 'メッセージを送信しました！');
        } else {
            return back()->with('error', 'メッセージ送信に失敗しました。');
        }
    }
}
