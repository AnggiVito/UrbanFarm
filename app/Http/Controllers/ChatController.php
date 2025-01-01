<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the chats.
     */
    public function index()
    {
        $chat = Chat::all();
        return view('chat.index', compact('chat'));
    }

    /**
     * Show the form for creating a new chat.
     */
    public function create()
    {
        return view('chat.tambah');
    }

    /**
     * Store a newly created chat in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Chat::create($validatedData);

        return redirect()->route('chat.index')->with('success', 'Chat berhasil ditambahkan!');
    }

    /**
     * Display the specified chat.
     */
    public function show(Chat $chat)
    {
        return view('chats.show', compact('chat'));
    }

    /**
     * Show the form for editing the specified chat.
     */
    public function edit(Chat $chat)
    {
        return view('chat.edit', compact('chat'));
    }

    /**
     * Update the specified chat in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $chat->update($validatedData);

        return redirect()->route('chat.index')->with('success', 'Chat berhasil diperbarui!');
    }

    /**
     * Remove the specified chat from storage.
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return redirect()->route('chat.index')->with('success', 'Chat berhasil dihapus!');
    }
}
