<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatworkService;
use Illuminate\Support\Facades\Log;
class ChatworkController extends Controller
{
    protected $chatworkService;

    public function __construct(ChatworkService $chatworkService)
    {
        $this->chatworkService = $chatworkService;
    }

    public function index()
    {
        return view('chatwork.index');
    }

    public function send(Request $request)
    {
        // $message = $request->input('message', 'Hello from Laravel!');
        $response = $this->chatworkService->sendMessage('');
        Log::info($response);
        return view('chatwork.index');
    }
}
