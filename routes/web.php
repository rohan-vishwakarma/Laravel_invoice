<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomUiController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web+" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class,'create']);
Route::post('/register', [RegisterController::class,'store']);


Route::get('/login', [LoginController::class,'create']);
Route::post('/login', [LoginController::class,'store']);

Route::get('/logout', [Logoutcontroller::class, 'destroy'])
    ->middleware('auth');

Route::get('/custom', [CustomUiController::class,'index']);
Route::post('custom', [CustomUiController::class,'create']);