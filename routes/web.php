<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePostController;
use App\Http\Controllers\AboutPostController;
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



//Route Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/Dashboard/Home/Posts/homeCheckSlug', [HomePostController::class, 'homeCheckSlug'])->Middleware('auth');
Route::resource('/Dashboard/Home/Posts', HomePostController::class)->Middleware('auth');
Route:
Route::get('/HomePost/{Post:slug}', [HomeController::class, 'show']);

//ROute Category
Route::get('/Categories', [CategoryController::class, 'index']);
Route::get('/Categories/{Category:id}', [CategoryController::class, 'show']);


// Route Dashboard
Route::get('/Dashboard', [DashboardController::class, 'index'])->Middleware('admin');
Route::get('/Dashboard/Posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->Middleware('auth');
Route::resource('/Dashboard/Posts', DashboardPostController::class)->Middleware('auth');

//  Route Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index']);
Route::post('/registrasi', [RegistrasiController::class, 'store']);

//Route Login
Route::get('/Login', [LoginController::class, 'index']);
Route::post('/Login', [LoginController::class, 'auth']);

//Route Logout
Route::post('/Logout', [LogoutController::class, 'Logout']);

// Route Blog
Route::get('/Blog', [BlogController::class, 'index']);
Route::get('/Post/{Post:slug}', [BlogController::class, 'show']);

// Route About
Route::get('/About', [AboutController::class, 'index']);
Route::get('/About/{Post:slug}', [AboutController::class, 'show']);
Route::get('/Dashboard/About/Posts/aboutCheckSlug', [AboutPostController::class, 'aboutCheckSlug'])->Middleware('auth');
Route::get('/Dashboard/About/Posts', [AboutPostController::class, 'index'])->Middleware('auth');
Route::get('/Dashboard/About/Posts/create', [AboutPostController::class, 'create'])->Middleware('auth');
Route::post('/Dashboard/About/Posts', [AboutPostController::class, 'store'])->Middleware('auth');
