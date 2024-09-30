<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->cover_image->extension();

        $request->cover_image->move(public_path('images'), $imageName);

        Manga::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover_image' => $imageName,
        ]);

        return redirect()->route('manga.index')
                     ->with('success', 'Manga creato con successo.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $manga = Manga::with(['tags', 'volumes'])->findOrFail($id);
        return response()->json($manga);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
