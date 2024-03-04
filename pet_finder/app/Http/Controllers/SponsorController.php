<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Sponsor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SponsorController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function createSponsorRequest(Request $request)
    {
        try {
            $animal = Animal::findorFail($request->animal_id);
            $user = Auth::user()->id;
            $sponsor = Sponsor::create([
                'user_id' => $user,
                'animal_id' => $animal->id,
                'status' => 'pending',
            ]);
            $sponsor->save();
            $message = 'Sponsor created successfully';
        } catch (QueryException $th) {
            $message = 'Sponsor could not be created';
        }
        return to_route('animals.show', compact('animal'))->with('message', $message);
    }

    public function confirmSponsorRequest(Request $request)
    {
        try {
            $s = Sponsor::where('user_id', $request->sponsor)
                ->where('animal_id', $request->animal)
                ->first();
            $s->status = 'confirmed';
            $s->save();
            $a = Animal::findorFail($request->animal);
            $a->sponsors_count++;
            $a->save();
            $message = 'Sponsor confirmed successfully';
        } catch (QueryException $th) {
            $message = 'Sponsor could not be confirmed';
        }
        return to_route('user.requests')->with('message', $message);
    }

    public function ignoreSponsorRequest(Request $request)
    {
        try {
            $s = Sponsor::where('user_id', $request->sponsor)
                ->where('animal_id', $request->animal)
                ->first();
            $s->delete();
            $message = 'Sponsor ignored successfully';
        } catch (QueryException $th) {
            $message = 'Sponsor could not be ignored';
        }
        return to_route('user.requests')->with('message', $message);
    }

    public function finishSponsorRequest(Request $request)
    {
        try {
            $s = Sponsor::where('user_id', $request->sponsor)
                ->where('animal_id', $request->animal)
                ->first();
            $s->delete();
            $a = Animal::findorFail($request->animal);
            $a->sponsors_count--;
            $a->save();
            $message = 'Sponsor finished successfully';
        } catch (QueryException $th) {
            $message = 'Sponsor could not be finished';
        }

        return to_route('user.requests')->with('message', $message);
    }

    public function finishSponsorRequestShow(Request $request)
    {
        try {
            $s = Sponsor::where('user_id', $request->sponsor)
                ->where('animal_id', $request->animal)
                ->first();
            $s->delete();
            $message = 'Sponsor finished successfully';
            $animal = Animal::findorFail($request->animal);
            $animal->sponsors_count--;
            $animal->save();
        } catch (QueryException $th) {
            $message = 'Sponsor could not be finished';
        }

        return to_route('animals.show', compact('animal'))->with('message', $message);
    }

    public function finishSponsor(Request $request)
    {
        try {
            $s = Sponsor::where('user_id', $request->sponsor)
                ->where('animal_id', $request->animal)
                ->first();
            $s->delete();
            $message = 'Sponsor finished successfully';
            $a = Animal::findorFail($request->animal);
            $a->sponsors_count--;
            $a->save();
        } catch (QueryException $th) {
            $message = 'Sponsor could not be finished';
        }

        return to_route('animals.mySponsoredsAnimals')->with('message', $message);
    }

    public function finishSponsorRequestMyEsponsoredsAnimals(Request $request)
    {
        try {
            $s = Sponsor::where('user_id', $request->sponsor)
                ->where('animal_id', $request->animal)
                ->first();
            $s->delete();
            $message = 'Sponsor request finished successfully';
        } catch (QueryException $th) {
            $message = 'Sponsor request could not be finished';
        }

        return to_route('animals.mySponsoredsAnimals')->with('message', $message);
    }
}
