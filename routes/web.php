<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);
Route::get('/getMovie/{id}', [HomeController::class,'getMovie']);
Route::get('/filterByCinema/{id}/{Movie_id}', [HomeController::class,'filterByCinema']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/bookings', [HomeController::class,'bookings'])->name('bookings');
    Route::post('/bookMovie', [HomeController::class,'bookMovie'])->name('bookMovie');
    Route::get('/cancelBooking/{id}', [HomeController::class,'cancelBooking'])->name('cancelBooking');
    Route::post('/updateProfile', [HomeController::class,'updateProfile'])->name('updateProfile');
    Route::get('profile',function (){
       return view('profile');
    })->name('profile');
});
require __DIR__.'/auth.php';
