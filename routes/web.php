<?php

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

use App\Http\Controllers\EventController;


Route::get('/contact', function () {
    return view('contact');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('events.dashboard');
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');

    Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');

    Route::post('/events', [EventController::class, 'store'])->name('events.store');

    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    
    Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->name('events.joinEvent');

    Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->name('events.leaveEvent');

});