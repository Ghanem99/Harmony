<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Habit;
App\Http\Requests\NoteRequests\CreateNoteRequest;

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
        Note::create($request->all());
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
