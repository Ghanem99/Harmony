<?php

namespace App\Http\Controllers\Api\V1\Lifestyle;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Lifestyle\StoreNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Lifestyle\Habit;
use App\Models\Lifestyle\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NoteController extends Controller
{
    public function index(Habit $habit): AnonymousResourceCollection
    {
        return NoteResource::collection($habit->notes()->paginate(10));
    }

    public function show(Habit $habit, Note $note): NoteResource
    {
        return new NoteResource($note);
    }

    public function store(StoreNoteRequest $request, Habit $habit): NoteResource
    {
        $note = $habit
            ->notes()
            ->create($request->validated());

        return new NoteResource($note);
    }

    public function update(StoreNoteRequest $request, Habit $habit, Note $note): NoteResource
    {
        $note->update($request->validated());

        return new NoteResource($note->fresh());
    }

    public function delete(Habit $habit, Note $note): JsonResponse
    {
        $note->delete();

        return new JsonResponse(['message' => 'Note Deleted Successfully!']);
    }
}
