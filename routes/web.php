<?php

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
})->name('home');

use App\Http\Controllers\CarController;

Route::middleware(['auth'])->group(function () {
    // Andere routes...
    Route::post('/offer-car', [CarController::class, 'offerCar'])->name('offer-car');
    Route::get('/offered-cars', [CarController::class, 'showOfferedCars'])->name('offered-cars');
    Route::delete('/offered-cars/{id}', [CarController::class, 'deleteOfferedCar'])->name('delete-offered-car');
});


require __DIR__.'/auth.php';
