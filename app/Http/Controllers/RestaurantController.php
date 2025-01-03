<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;



class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restaurant = Restaurant::firstOrFail();

        if ($restaurant->image_path) {
            // Costruisce l'URL completo usando il metodo asset
            $restaurant->image_url = asset('storage/' . $restaurant->image_path);
        }
        
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Log::info('1', $request->all());
        // Log::info('2', $request->json()->all());

        // Validazione dei dati
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:30|regex:/^[0-9+\-()\s]*$/',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Trova il ristorante
        $restaurant = Restaurant::find($id);

        // Verifica se il ristorante esiste
        if(!$restaurant) {
            return response()->json(['message' => 'Ristorante non trovato'], 404);
        }

        // Usa solo i dati validati per l'aggiornamento
        $data = $request->only(['name', 'address', 'phone', 'email', 'description']);

        // Gestione immagine
        if ($request->hasFile('image')) {
            // Elimina l'immagine precedente se esiste
            if ($restaurant->image_path) {
                Storage::disk('public')->delete($restaurant->image_path);
            }

            // Salva la nuova immagine
            // Nome originale
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            
            // Unicità 
            $uuid = Str::uuid();

            // Estensione file
            $extension = $image->getClientOriginalExtension();

            // Nome finale
            $imageName = $originalName . '-' . $uuid . '.' . $extension;

            // Salvataggio sul disco
            $imagePath = $image->storeAs('uploads/images', $imageName, 'public');

            $data['image_path'] = $imagePath;
            $data['image_name'] = $imageName;
        }

        $restaurant->update($data);

        return response()->json([
            'message' => 'Ristorante aggiornato con successo!',
            'data' => $restaurant
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return response()->json(null, 204);
    }
}
