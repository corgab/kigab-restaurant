<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
    
        // Su ogni galleria e aggiungi l'url dell'immagine
        foreach ($galleries as $gallery) {
            if ($gallery->path) {
                // Url completo
                $gallery->image_url = asset('storage/galleries/' . basename($gallery->path));
            }
        }
    
        // Restituisci la collezione modificata
        return response()->json($galleries);
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
        // Validazione della richiesta
        $request->validate([
            'title' => 'nullable|string|max:255',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('path')) {
            // Salvataggio dell'immagine
            $imagePath = $request->file('path')->store('public/galleries');

            // Salvataggio dei dettagli nel database
            $gallery = new Gallery();
            $gallery->title = $request->input('title');
            $gallery->path = $imagePath;
            $gallery->save();

            return response()->json(['message' => 'Immagine salvata con successo!', 'data' => $gallery], 201);
        }

        return response()->json(['message' => 'Immagine non trovata!'], 400);
    }
        

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return response()->json($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Eliminazione del file
        Storage::delete($gallery->path);

        $gallery->delete();

        return response()->json(['message' => 'Image deleted successfully']);
    }
}
