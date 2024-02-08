<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Habit;
use App\Http\Requests\NoteRequests\CreateNoteRequest;
use App\Http\Resources\NoteResource;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index($habitId) {
        $notes = Note::where('habit_id', '=', $habitId)->get();

        return NoteResource::collection($notes);
    }

    public function show($habitId, $note_id) 
    {
        $note = Note::find($note_id);
        return new NoteResource($note);
    }

    public function store(CreateNoteRequest $request, $habitId) 
    {
        $validatedData = $request->validated();
        $validatedData['habit_id'] = $habitId;

        $note = Note::create($validatedData);

        if (!$note) {
            return new JsonResponse(['message' => 'Something Went Wrong!']);
        }

        return new JsonResponse([
            'message' => 'Note Created Successfully!', 
            'date' => new NoteResource($note)
        ]);
    }

    public function update() 
    {
        Note::update($request->all());
    }

    public function destroy(Note $note) 
    {
        $note->destroy();
    }
}
