<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the articles.
     */
    public function index()
    {
        // Get all articles
        $artikels = artikel::all();

        return view('artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        return view('artikel.tambah');
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'tittle' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'text' => 'required|string',
        ]);

        // Handle file upload
        $photoPath = $request->file('photo')->store('artikel_photos', 'public');

        // Create article
        artikel::create([
            'tittle' => $request->tittle,
            'photo' => $photoPath,
            'text' => $request->text,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dibuat!');
    }

    /**
     * Display the specified article.
     */
    public function show($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit($id)
    {
        $artikel = artikel::findOrFail($id);

        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'tittle' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'text' => 'required|string',
        ]);

        $artikel = artikel::findOrFail($id);

        // Update photo if uploaded
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('artikel_photos', 'public');
            $artikel->photo = $photoPath;
        }

        // Update other fields
        $artikel->tittle = $request->tittle;
        $artikel->text = $request->text;
        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy($id)
    {
        $artikel = artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
