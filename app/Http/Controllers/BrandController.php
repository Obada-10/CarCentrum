<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);

        Brand::create($request->only('name'));

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
        ]);

        $brand->update($request->only('name'));

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
