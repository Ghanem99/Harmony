<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memories = Memory::all();
        if ($memories->isEmpty()) {
            return response()->json(['message' => 'No Memories Found!']);
        }

        return response()->json($memories);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $memory =Memory::create($request->all()); 
 
        if ($request->hasFile('image')) { 
            $file = $request->file('image'); 
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('images'), $filename);  
            $memory->image = $filename;  
            $memory->save(); 
        } 
        return response()->json($memory); 
    }
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $memory =Memory::findOrFail($id);
        return response()->json($memory);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $memory =Memory::findOrFail($id);
        $memory->update($request->all());
        return response()->json(['message' => 'Memory updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Memory::destroy($id);
        return response()->json(['message' => 'The Memory is deleted']);
    }
}
