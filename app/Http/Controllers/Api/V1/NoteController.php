<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Habit;
use App\Http\Requests\NoteRequests\StoreNoteRequest;
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

    public function store(StoreNoteRequest $request, $habitId) 
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

    public function update(StoreNoteRequest $request, $habitId, $noteId) 
    {
        $note = Note::where('id', $noteId)
                    ->where('habit_id', $habitId)
                    ->firstOrFail();
    
        if (!$note) {
            return new JsonResponse(['message' => 'Note Not Found'], 404);
        }
    
        $note->update($request->validated()); 
    
        return new JsonResponse([
            'message' => 'Note Updated Successfully!', 
            'data' => new NoteResource($note->fresh()) 
        ]);
    }

    public function destroy($habitId, $noteId) 
    {
        $note = Note::where('id', $noteId)
                    ->where('habit_id', $habitId)
                    ->firstOrFail();
    
        $note->delete();
    
        return new JsonResponse(['message' => 'Note Deleted Successfully!']);
    }
}
