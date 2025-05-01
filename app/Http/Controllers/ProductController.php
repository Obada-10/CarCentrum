<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    

    public function byCategory($id)
    {
        $category = Category::findOrFail($id); // Zoek op ID
        $producten = Product::where('category_id', $category->id)->get();

        return view('products.byCategory', compact('producten', 'category'));
    }

    public function index(Request $request)
    {
        $categories = Category::all();

        // Haal de producten op en filter ze indien een categorie geselecteerd is
        $products = Product::when($request->category, function ($query) use ($request) {
            return $query->where('category_id', $request->category);
        })->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $productData = $request->only([
            'name', 'description', 'price', 'stock', 'category_id', 'brand_id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image_path'] = $imagePath;
        } else {
            $productData['image_path'] = 'default.jpg'; // Of laat leeg/null
        }

        Product::create($productData);

        return redirect()->route('products.index')->with('success', 'Product succesvol toegevoegd.');
    }

    public function edit(Product $product)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $productData = $request->only([
            'name', 'description', 'price', 'stock', 'category_id', 'brand_id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image_path'] = $imagePath;
        }

        $product->update($productData);

        return redirect()->route('products.index')->with('success', 'Product succesvol bijgewerkt.');
    }

    public function destroy(Product $product)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product succesvol verwijderd.');
    }
   
}
