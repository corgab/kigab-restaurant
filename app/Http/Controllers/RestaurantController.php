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

        if($restaurant->menu) {
            $restaurant->menu_url = asset('storage/' . $restaurant->menu);
        }
        
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validazione dei dati
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'menu' => 'nullable|file|mimes:pdf|max:10240', // 10MB
        ]);
    
        // Trova il ristorante
        $restaurant = Restaurant::find($id);
    
        // Verifica se il ristorante esiste
        if (!$restaurant) {
            return response()->json(['message' => 'Ristorante non trovato'], 404);
        }
    
        // Usa solo i dati validati per l'aggiornamento
        $data = $request->only(['name', 'address', 'phone', 'email', 'description']);
    
        // Gestione dell'immagine
        if ($request->hasFile('image')) {
            // Elimina l'immagine precedente se esiste
            if ($restaurant->image_path) {
                Storage::disk('public')->delete($restaurant->image_path);
            }
    
            // Salva la nuova immagine
            $image = $request->file('image');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $uuid = Str::uuid();
            $extension = $image->getClientOriginalExtension();
            $imageName = $originalName . '-' . $uuid . '.' . $extension;
            $imagePath = $image->storeAs('restaurant', $imageName, 'public');
    
            $data['image_path'] = $imagePath;
            $data['image_name'] = $imageName;
        }
    
        // Gestione del file del menu
        if ($request->hasFile('menu')) {
            // Elimina il menu precedente se esiste
            if ($restaurant->menu) {
                Storage::disk('public')->delete($restaurant->menu);
            }
    
            // Salva il nuovo file del menu
            $menu = $request->file('menu');
            $originalName = pathinfo($menu->getClientOriginalName(), PATHINFO_FILENAME);
            $uuid = Str::uuid();
            $extension = $menu->getClientOriginalExtension();
            $menuName = $originalName . '-' . $uuid . '.' . $extension;
            $menuPath = $menu->storeAs('restaurants', $menuName, 'public');
    
            $data['menu'] = $menuPath;
        }
    
        // Esegui l'aggiornamento del ristorante
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
