<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Zorg ervoor dat je het juiste pad naar je Category model gebruikt
use Illuminate\Support\Facades\Auth; // Zorg ervoor dat je de juiste namespace voor Auth gebruikt
use App\Models\Product;

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


    public function show_categories()
{
    // Haal 4 categorieën op
    $categories = Category::take(4)->get();

    // Haal 3 willekeurige producten op
    $featuredProducts = Product::inRandomOrder()->take(3)->get();

    // Geef beide door aan de view
    return view('welcome', compact('categories', 'featuredProducts'));
}
    

    public function create()
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }
        // Toon de formulier voor het aanmaken van een nieuwe categorie
        return view('categories.create');
    }

    public function store(Request $request)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }
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



    public function edit(Category $category)

    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        return view('categories.edit', compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }
        // Valideer de inkomende gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Werk de categorie bij
        $category->update($request->all());

        // Redirect naar de index pagina met een succesbericht
        return redirect()->route('categories.index')->with('success', 'Categorie succesvol bijgewerkt.');
    }


    public function destroy(Category $category)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }
        // Verwijder de categorie
        $category->delete();

        // Redirect naar de index pagina met een succesbericht
        return redirect()->route('categories.index')->with('error', 'Categorie succesvol verwijderd.');
    }
}
