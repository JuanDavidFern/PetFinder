<?php

namespace App\Http\Controllers;

use App\Http\Requests\APIAnimalRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class apianimalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();

        return response()->json([
            "animals" => $animals,
            "success" => true
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(APIAnimalRequest $request)
    {
        $animal = Animal::create($request->all());
        return response()->json([
            "animal" => $animal,
            "success" => true,
            "message" => "Animal created successfully"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = Animal::find($id);
        return response()->json([
            "animal" => $animal,
            "success" => true,
            "message" => "Animal found successfully"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(APIAnimalRequest $request, string $id)
    {
        $animal = Animal::find($id);
        $animal->update($request->all());
        return response()->json([
            "animal" => $animal,
            "success" => true,
            "message" => "Animal updated successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return response()->json([
            "success" => true,
            "message" => "Animal deleted successfully"
        ], 200);
    }
}
