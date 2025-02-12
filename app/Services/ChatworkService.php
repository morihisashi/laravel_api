<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

class ChatworkService
{
    protected $apiToken;
    protected $roomId;
    protected $baseUrl = 'https://api.chatwork.com/v2';

    public function __construct()
    {
        try {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
            $dotenv->load();
        } catch (InvalidPathException $e) {
            echo 'Error loading .env file: ',  $e->getMessage();
            exit;
        }
        $this->apiToken = env('CHATWORK_API_TOKEN');
        $this->roomId = env('CHATWORK_ROOM_ID');
    }

    public function sendMessage($message)
    {
        $url = "{$this->baseUrl}/rooms/{$this->roomId}/messages";

        $response = Http::withHeaders([
            'X-ChatWorkToken' => $this->apiToken,
        ])->post($url, [
            'body' => $message,
        ]);

        return $response->json();
    }
}
