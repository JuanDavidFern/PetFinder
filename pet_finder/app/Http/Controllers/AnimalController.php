<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalRequest;
use App\Http\Requests\AnimalUpdateRequest;
use App\Models\Animal;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRequest $request)
    {
        try {
            $request->validated();

            $animal = new Animal();
            $animal->name = $request->name;
            $animal->age = $request->age;
            $animal->type = $request->type;
            $animal->characteristics = $request->characteristics;
            $animal->information = $request->information;
            $animal->current_owner_id = Auth::user()->id;
            $animal->sponsors_count = 0;

            $animalPhoto = time() . "-" . $request->file("photo")->getClientOriginalName();
            $animal->photo = "storage/animal_imgs/" . $animalPhoto;

            $request->file("photo")->storeAs("public/animal_imgs", $animalPhoto);
            $animal->save();
            $message = 'Animal createted successfully';
        } catch (QueryException $th) {
            $message = 'Animal could not be created';
        }

        $animals = Auth::user()->animals;
        return to_route('animals.myAnimals', compact('animals'))->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {

        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalUpdateRequest $request, Animal $animal)
    {
        try {
            $request->validated();
            $animal->name = $request->name;
            $animal->age = $request->age;
            $animal->type = $request->type;
            $animal->characteristics = $request->characteristics;
            $animal->information = $request->information;

            if (isset($request->photo)) {
                Storage::delete("public/animal_imgs/" . Str::replaceFirst("storage/animal_imgs/", "", $animal->photo));
                $animalPhoto = time() . "-" . $request->file("photo")->getClientOriginalName();
                $animal->photo = "storage/animal_imgs/" . $animalPhoto;
                $request->file("photo")->storeAs("public/animal_imgs", $animalPhoto);
            }
            $animal->save();
            $message = 'Animal updated successfully';
        } catch (QueryException $th) {
            $message = 'Animal could not be updated';
        }

        $animals = Auth::user()->animals;
        return to_route('animals.myAnimals', compact('animals'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        try {
            Storage::delete("public/animal_imgs/" . Str::replaceFirst("storage/animal_imgs/", "", $animal->photo));
            $animal->delete();
            $message = 'Animal deleted successfully';
        } catch (QueryException $th) {
            $message = 'Animal could not be deleted';
        }
        $animals = Auth::user()->animals;
        // return view('animals.my-animals', compact('animals'))->with('message', $message);
        return to_route('animals.myAnimals', compact('animals'))->with('message', $message);
    }

    public function myAnimals()
    {
        $animals = Auth::user()->animals;
        return view('animals.my-animals', compact('animals'));
    }

    public function mySponsoredsAnimals()
    {
        return view('animals.my-sponsoreds-animals');
    }
}
