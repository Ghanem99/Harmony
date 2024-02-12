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
    public function index(Habit $habit) {
        $notes = Note::where('habit_id', '=', $habit->id)->get();

        return NoteResource::collection($notes);
    }

    public function show(Habit $habit, Note $note) 
    {
        $note = Note::find($note->id);
        return new NoteResource($note);
    }

    public function store(StoreNoteRequest $request, Habit $habit) 
    {
        $validatedData = $request->validated();
        $validatedData['habit_id'] = $habit->id;

        $note = Note::create($validatedData);

        if (!$note) {
            return new JsonResponse(['message' => 'Something Went Wrong!']);
        }

        return new JsonResponse([
            'message' => 'Note Created Successfully!', 
            'date' => new NoteResource($note)
        ]);
    }

    public function update(StoreNoteRequest $request, Habit $habit, Note $note) 
    {
        $note = Note::where('id', $note->id)
                    ->where('habit_id', $habit->id)
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

    public function destroy(Habit $habit, Note $note) 
    {
        $note = Note::where('id', $note->id)
                    ->where('habit_id', $habit->id)
                    ->firstOrFail();
    
        $note->delete();
    
        return new JsonResponse(['message' => 'Note Deleted Successfully!']);
    }
}
