<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\growplan;
use Illuminate\Http\Request;

class GrowplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $growplan = Growplan::all();
        return view('growplan.index')->with('growplan', $growplan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('growplan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required|string|max:255',
            'seed' => 'required|string|max:255',
            'land' => 'required|string|max:255',
            'soil' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        // Menyimpan data Growplan baru
        Growplan::create([
            'tittle' => $request->tittle,
            'seed' => $request->seed,
            'land' => $request->land,
            'soil' => $request->soil,
            'tanggal' => $request->tanggal,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('growplan.index')->with('success', 'Growplan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $growplan = Growplan::findOrFail($id);
        
        return view('growplan.show', compact('growplan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $growplan = Growplan::findOrFail($id);
        
        return view('growplan.edit', compact('growplan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tittle' => 'required|string|max:255',
            'seed' => 'required|string|max:255',
            'land' => 'required|string|max:255',
            'soil' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        // Mencari Growplan berdasarkan ID
        $growplan = Growplan::findOrFail($id);

        // Update data Growplan
        $growplan->update([
            'tittle' => $request->tittle,
            'seed' => $request->seed,
            'land' => $request->land,
            'soil' => $request->soil,
            'tanggal' => $request->tanggal,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('growplan.index')->with('success', 'Growplan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $growplan = Growplan::findOrFail($id);

        // Menghapus growplan dari database
        $growplan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('growplan.index')->with('success', 'Growplan berhasil dihapus!');
    }
}
