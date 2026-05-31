<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//routes pour la page d'accueil
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//routes pour les différents dashboards
Route::get('/client-dashboard', function () {
    return view('client.dashboard');
})->middleware(['auth', 'verified'])->name('client.dashboard');

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');



// Pour la page d'accueil (le welcome)
Route::get('/', [HotelController::class, 'welcome'])->name('welcome');




// Routes pour les hôtels
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');

Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');

Route::get('/hotels/search', [HotelController::class, 'search'])->name('hotel.search');

Route::post('/hotels/store', [HotelController::class, 'store'])->name('hotels.store');

Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');
Route::put('/hotels/create', [HotelController::class, ''])->name('hotels.show');

// Route pour voir toutes les images d'un hôtel spécifique
Route::get('/hotels/{hotel}/images', [App\Http\Controllers\HotelController::class, 'allImages'])->name('hotels.images');



Route::get('/about', function () {
    return view('about');
});



Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
require __DIR__.'/auth.php';


Route::get('/room', [RoomController::class, 'index'])->name('room.index');

Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');

Route::post('/room', [RoomController::class, 'store'])->name('room.store');

Route::get('/room/{id}', [RoomController::class, 'show'])->name('room.show');
//route pour les reservations

Route::get('/reservation/{id}', [ReservationController::class, 'index'])->name('reservation.index');

Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');

Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/reservation/{id}', [ReservationController::class, 'show'])->name('reservation.show');

