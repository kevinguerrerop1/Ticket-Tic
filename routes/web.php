<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\DetalleTicketsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;


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

//Servicios
Route::resource('/servicios', ServiciosController::class);

//Tickets
Route::group(['middleware' => 'auth'], function () {
    Route::resource('tickets', TicketsController::class);
    Route::get('tickets/{id}/asignar', [TicketsController::class,'asignar']);
    Route::get('/viewactivos', [TicketsController::class,'viewactivos']);
    Route::get('/viewxusu', [TicketsController::class,'viewxusu']);
    Route::get('tickets/{id}/cerrar', [TicketsController::class,'cerrar']);
});

//Detalles Ticket
Route::group(['middleware' => 'auth'], function () {
    Route::resource('detalles', DetalleTicketsController::class);
    Route::get('detalles/{id}/datos', [DetalleTicketsController::class,'datos']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', AdminController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('perm', PermissionController::class);
});


//Usuarios
Route::resource('/users', UserController::class);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
