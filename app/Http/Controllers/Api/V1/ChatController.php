<?php

namespace App\Http\Controllers\Api\V1;

use Pusher\Pusher;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class ChatController extends Controller
{
    public function index(): Collection
    {
        return Chat::with('user')->get(); // ToDo: use pagination and CustomResource
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]); // ToDo: use FormRequest

        Chat::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            ]
        ); // ToDo: use PusherService

        $aiResponse = $this->aiResponse($request->message); 

        $data = ['message' => $aiResponse, 'user_id' => Auth::id()];
        $pusher->trigger('chat-channel', 'chat-event', $data);

        return response()->json([
            'message' => 'Message sent successfully', 
            'data' => $data
        ], 201); // ToDo: use CustomResource
    }

    public function aiResponse($message)
    {
        return 'AI: ' . 'When I am ready to talk, I will. For now, I will just listen.';
    }
}
