<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Habit;
use App\Http\Requests\NoteRequests\CreateNoteRequest;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index() {
        $notes = Note::all();

        return $notes;
    }

    public function show($habit_id, $note_id) 
    {
        $note = Note::find($note_id);
        return $note;
    }

    public function store(CreateNoteRequest $request) 
    {
        $note = Note::create($request->all());

        if (!$note) {
            return new JsonResponse(['message' => 'Something Went Wrong!']);
        }

        return new JsonResponse([
            'message' => 'Note Create Successfully!', 
            'date' => new CreateNoteResource($note)
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
