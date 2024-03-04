<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class DashboardController extends Controller
{
    public function index()
    {
        // $animals = Animal::all(); // Obtener todos los animales de la base de datos
        // return view('dashboard', compact('animals'));
        return view('dashboard');
    }
}
