<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('events', EventController::class, [
        'names' => [
            'store' => 'events.store',
            'create' => 'events.create',

        ]
    ])->except(['show']);;

    Route::get('events/delete/{id}', [EventController::class, 'destroy'])->name('events.delete');

    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

    Route::post('events/{id}/update', [EventController::class, 'update'])->name('events.update');
});


Route::get('events', [EventController::class, 'index'])->name('events');

Route::get('events/{id}', [EventController::class, 'show'])->name('events.details');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
