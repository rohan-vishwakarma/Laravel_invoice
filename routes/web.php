<?php

use App\Http\Controllers\profile\UserProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\OtpController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomUiController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Customers\Customers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Invoice\Invoice;
use App\Http\Middleware\CheckSession;
use App\Mail\webmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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



Route::get('/otp-verification', [OtpController::class,'index']);
Route::post('/otp-verification', [OtpController::class,'store']);


Route::get('/login', [LoginController::class,'create'])->name('login');
Route::post('/login', [LoginController::class,'store']);



Route::get('/logout', [Logoutcontroller::class, 'destroy'])
    ->middleware('auth');

Route::get('/custom', [CustomUiController::class,'index']);
Route::post('custom', [CustomUiController::class,'create']);

Route::get('/profile', [UserProfileController::class,'index']);


Route::get('/customers', [Customers::class,'index'])->name('customers');
Route::get('/addcustomers', [Customers::class,'create']);
Route::post('/addcustomers', [Customers::class,'store']);

Route::get('/company', [CompanyController::class,'index']);
Route::post('/company', [CompanyController::class,'update']);


Route::get('/invoices', [Invoice::class,'index']);

Route::get('/createinvoice', [Invoice::class,'create']);
Route::post('/createinvoice', [Invoice::class,'store']);




Route::get('/dashboard', [Dashboard::class,'index']);


Route::get('/webmail', function() {
    $name = "Funny Coder";

    // The email sending is done using the to method on the Mail facade
    Mail::to('rohanvishwakarma685@gmail.com')->send(new webmail($name));
});