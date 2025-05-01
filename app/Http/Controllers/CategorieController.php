<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Zorg ervoor dat je het juiste pad naar je Category model gebruikt

class CategorieController extends Controller
{
    //

    public function index()
    {
        // Haal alle categorieën op uit de database
        $categories = Category::all();

        // Return de categorieën naar de view
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // Toon de formulier voor het aanmaken van een nieuwe categorie
        return view('categories.create');
    }
    
    public function store(Request $request)
    {
        // Valideer de inkomende gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Maak een nieuwe categorie aan
        Category::create($request->all());

        // Redirect naar de index pagina met een succesbericht
        return redirect()->route('categories.index')->with('success', 'Categorie succesvol aangemaakt.');
    }
}
