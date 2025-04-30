<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        return view('brands.create');
    }

    public function store(Request $request)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|unique:brands,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Beperkingen voor de afbeelding
        ]);
    
        $brandData = $request->only('name');
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brands', 'public');
            $brandData['image'] = $imagePath;
        }
    
        Brand::create($brandData);
    
        return redirect()->route('brands.index')->with('success', 'Merk toegevoegd!');
    }


    public function edit(Brand $brand)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|unique:brands,name,' . $brand->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $brandData = $request->only('name');
    
        if ($request->hasFile('image')) {
            // Verwijder de oude afbeelding
            if ($brand->image) {
                Storage::disk('public')->delete($brand->image);
            }
    
            // Sla de nieuwe afbeelding op
            $imagePath = $request->file('image')->store('brands', 'public');
            $brandData['image'] = $imagePath;
        }
    
        $brand->update($brandData);
    
        return redirect()->route('brands.index')->with('success', 'Merk bijgewerkt!');
    }

    public function destroy(Brand $brand)
    {
        if (!in_array(Auth::user()->role, ['admin', 'verkoper'])) {
            abort(403);
        }

        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Merk verwijderd!');
    }
}
