<?php

namespace App\Http\Controllers\Api\V1;

use Pusher\Pusher;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        return Chat::with('user')->get();
    }

    public function store(Request $request)
    {
        $chat = new Chat;
        $chat->user_id = Auth::id();
        $chat->message = $request->message;
        $chat->save();

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            ]
        );

        $aiResponse = $this->aiResponse($request->message);

        $data = ['message' => $aiResponse, 'user_id' => Auth::id()];
        $pusher->trigger('chat-channel', 'chat-event', $data);

        return response()->json(['message' => 'Message sent successfully'], 201);
    }

    public function aiResponse($message)
    {
        // $client = new Client(); // where the AI model is hosted
        // $response = $client->request('POST', 'https://api.openai.com/v1/completions', [
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //         'Authorization' => 'Bearer YOUR_OPENAI_API_KEY',
        //     ],
        //     'json' => [
        //         'prompt' => $message,
        //         'max_tokens' => 50,
        //         'temperature' => 0.7,
        //         'top_p' => 1,
        //         'n' => 1,
        //         'stop' => ['\n'],
        //     ],
        // ]);

        // return json_decode($response->getBody()->getContents())->choices[0]->text;
    }
}
