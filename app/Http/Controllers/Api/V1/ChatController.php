<?php

namespace App\Http\Controllers\Api\V1;

use Pusher\Pusher;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function show()
    {
        return Auth::user()->chat()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string', 
        ]); 

        $userChat = Auth::user()->chat ?? Auth::user()->chat()->create();

        $message = Message::create([
            'chat_id' => $userChat->id,
            'content' => $request->message,
        ]);

        $modelResponse =  $this->aiResponse($request->message);

        return response()->json([ 
            'data' => $modelResponse
        ], 201); 
    }

    public static function aiResponse($message)
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
