<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Zorg ervoor dat je het juiste pad gebruikt
use App\Models\Category; // Zorg ervoor dat je het juiste pad gebruikt

class ProductController extends Controller
{
    
    

    public function index($id)
    {
        $category = Category::findOrFail($id); // Zoek op ID
    
        $producten = Product::where('category_id', $category->id)->get();
    
        return view('products.index', compact('producten', 'category'));
    }
    

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }    
}
