<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Ristoranti
Route::resource('restaurants', RestaurantController::class)->except(['create','delete','show']);


// Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/restaurants', [RestaurantController::class, 'store']); Deve poter modificare non creare !!
    // Route::put('/restaurants/{restaurant}', [RestaurantController::class, 'update']);
    // Route::delete('/restaurants/{restaurant}', [RestaurantController::class, 'destroy']);
// });
// Route::get('/restaurants', [RestaurantController::class, 'index']);

// Sezioni
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('sections', SectionController::class)->only('destroy');
});
Route::resource('sections', SectionController::class)->only(['index', 'show']);

// Route::middleware('auth:sanctum')->group(function () {
Route::get('pages', [PageController::class, 'index']);
Route::put('pages/{slug}', [PageController::class, 'update']);
// });
Route::get('pages/{slug}', [PageController::class, 'show']);

// Galleria Immagini
// Route::middleware('auth:sanctum')->group(function () {
    Route::post('/galleries', [GalleryController::class, 'store']);    
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy']);
// });
Route::get('/galleries', [GalleryController::class, 'index']);
Route::get('/galleries/{gallery}', [GalleryController::class, 'show']);
