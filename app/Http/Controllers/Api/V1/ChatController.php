<?php

namespace App\Http\Controllers\Api\V1;

use Pusher\Pusher;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function index()
    {
        return Auth::user()->chat()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string', 
        ]); 

        $data = Chat::create([
            'user_id' => Auth::id(),
            'message' => $request->message, 
            'ai_response' => $this->aiResponse($request->message),
        ]);

        return response()->json([
            'message' => 'Message sent successfully', 
            'data' => $data
        ], 201); 
    }

    public function aiResponse($message)
    {
        $response = Http::post('https://api.openai.com/v1/ai-chat', [
            'prompt' => $message,
            'max_tokens' => 150,
            'temperature' => 0.7,
            'top_p' => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        return $response->json()['choices'][0]['text'];
    }
}
