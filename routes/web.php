<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/client-dashboard', function () {
    return view('client.dashboard');
})->middleware(['auth', 'verified'])->name('client.dashboard');

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');

Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/search', [HotelController::class, 'search'])->name('hotel.search');
Route::get('/hotels', [HotelController::class, 'index'])-> name('hotels.index');

Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');

Route::get('/about', function () {
    return view('about');
});

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
require __DIR__.'/auth.php';
