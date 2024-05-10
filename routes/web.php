<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\DetalleTicketsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('/servicios', ServiciosController::class);
Route::resource('tickets', TicketsController::class);
Route::get('tickets/{id}/asignar', [TicketsController::class,'asignar']);

Route::resource('detalles', DetalleTicketsController::class);
Route::get('detalles/{id}/datos', [DetalleTicketsController::class,'datos']);


Route::get('/viewactivos', [TicketsController::class,'viewactivos']);


Route::resource('/users', UserController::class);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
