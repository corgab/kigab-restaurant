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
            'title' => 'required|string|max:255',
            'filename' => 'required|string|max:255',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Controlla se il file è stato ricevuto
        if ($request->hasFile('path')) {
            // Salvataggio dell'immagine nella cartella 'public/galleries'
            $imagePath = $request->file('path')->store('public/galleries');
            $filename = basename($imagePath);

            // Salvataggio dei dettagli nel database
            $gallery = new Gallery();
            $gallery->title = $request->input('title');
            $gallery->filename = $filename;
            $gallery->path = $imagePath;
            $gallery->save();

            // Restituisce una risposta JSON di successo
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
