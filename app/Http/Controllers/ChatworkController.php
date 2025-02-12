<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatworkService;

class ChatworkController extends Controller
{
    protected $chatworkService;

    public function __construct(ChatworkService $chatworkService)
    {
        $this->chatworkService = $chatworkService;
    }

    public function send(Request $request)
    {
        $message = $request->input('message', 'Hello from Laravel!');
        $response = $this->chatworkService->sendMessage($message);

        return response()->json($response);
    }
}
