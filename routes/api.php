<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\AboutApiController;
use App\Http\Controllers\BlogApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryApiController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which'
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Home route rest full api
Route::get('/Home', [HomeApiController::class, 'index']);
Route::post('/Home/store', [HomeApiController::class, 'store']);
Route::get('/Home/show/{id}', [HomeApiController::class, 'show']);
Route::post('/Home/update/{id}', [HomeApiController::class, 'update']);
Route::get('/Home/destroy/{id}', [HomeApiController::class, 'destroy']);


// Post route rest full  api
Route::get('/pstApi', [BlogApiController::class, 'index']);
Route::Post('/pstApi/store', [BlogApiController::class, 'store']);
Route::get('/pstApi/show/{id}', [BlogApiController::class, 'show']);
Route::Post('/pstApi/update/{id}', [BlogApiController::class, 'update']);
Route::get('/pstApi/destroy/{id}', [BlogApiController::class, 'destroy']);


// Category rest full api
Route::get('/CategoryApi', [CategoryApiController::class, 'index']);
Route::Post('/CategoryApi/store', [CategoryApiController::class, 'store']);
Route::get('/CategoryApi/show/{id}', [CategoryApiController::class, 'show']);
Route::Post('/CategoryApi/update/{id}', [CategoryApiController::class, 'update']);
Route::get('/CategoryApi/destroy/{id}', [CategoryApiController::class, 'destroy']);

// User rest full api
Route::get('/User', [UserController::class, 'index']);
Route::post('/User/store', [UserController::class, 'store']);

// About rest full api
Route::get('/AboutApi', [AboutApiController::class, 'index']);
Route::post('/AboutApi/store', [AboutApiController::class, 'store']);
Route::get('/AboutApi/show/{id}', [AboutApiController::class, 'show']);
Route::post('/AboutApi/update/{id}', [AboutApiController::class, 'update']);
Route::get('/AboutApi/destroy/{id}', [AboutApiController::class, 'destroy']);
