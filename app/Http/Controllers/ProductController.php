<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'harga' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads/products', 'public');
        }

        Product::create([
            'nama' => $request->nama,
            'photo' => $photoPath,
            'category' => $request->category,
            'description' => $request->description,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'harga' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        if ($request->hasFile('photo')) {
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }
            $photoPath = $request->file('photo')->store('uploads/products', 'public');
            $product->photo = $photoPath;
        }

        $product->update([
            'nama' => $request->nama,
            'category' => $request->category,
            'description' => $request->description,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
