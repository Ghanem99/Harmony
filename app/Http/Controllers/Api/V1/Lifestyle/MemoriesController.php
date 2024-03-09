<?php

namespace App\Http\Controllers\Api\V1\Lifestyle;
use App\Models\Lifestyle\Hapit;
use App\Http\Controllers\Controller;
use App\Models\Lifestyle\Memory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MemoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Memory::all();
        if ($images->isEmpty()) {
            return new JsonResponse(['message' => 'No Memories Found!']);
        }

        return response()->json(['image' => $images], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'image' =>  'required|url'
            
        ]);
       
        //$image = Memory::create($request->all());
        try {
            // You can save the image link directly to the database
            $image = auth()->user()->habits()->memories()->create(['image' => $request->input('image_link')]);
    
            return response()->json(['message' => 'Image link added successfully', 'image' => $image], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error adding image link', 'error' => $e->getMessage()], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $image = Memory::findOrFail($id);

        return response()->json(['image' => $image], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Memory::findOrFail($id);
        $image->update($request->all());
        return response()->json(['message' => 'Image updated successfully', 'image' => $image], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Memory::destroy($id);
        return response()->json(['message' => 'Image deleted successfully'], 200);

    }
}
