<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SeatAllocationController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips/store', [TripController::class, 'store'])->name('trips.store');

Route::get('/trips/available-seats', [TripController::class, 'showAvailableSeats'])->name('trips.available-seats');
Route::get('/trips/purchase/{tripId}/{seatNumber}', [TripController::class, 'purchaseTicket'])->name('trips.purchase');

Route::get('/user/tickets', [UserController::class, 'userTickets'])->name('user.tickets');
