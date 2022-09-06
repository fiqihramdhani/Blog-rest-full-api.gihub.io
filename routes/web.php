<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DashboardPostController;
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
// Route Category


//Route Home
Route::get('/', [HomeController::class, 'index']);


Route::get('/Categories', [CategoryController::class, 'index']);
Route::get('/Categories/{Category:id}', [CategoryController::class, 'show']);


// Route Dashboard
Route::get('/Dashboard', [DashboardController::class, 'index']);
Route::get('/Dashboard/Posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/Dashboard/Posts', DashboardPostController::class);

//  Route Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index']);
Route::post('/registrasi', [RegistrasiController::class, 'store']);

//Route Login
Route::get('/Login', [LoginController::class, 'index']);
Route::post('/Login', [LoginController::class, 'auth']);

//Route Logout
Route::post('/Logout', [LogoutController::class, 'Logout']);
