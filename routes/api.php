<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('/Home', [HomeController::class, 'index']);
Route::post('/Home/store', [HomeController::class, 'store']);
Route::get('/Home/show/{id}', [HomeController::class, 'show']);
Route::post('/Home/update/{id}', [HomeController::class, 'update']);
Route::get('/Home/destroy/{id}', [HomeController::class, 'destroy']);


// Post route rest full  api
Route::get('/pstApi', [PostController::class, 'index']);
Route::Post('/pstApi/store', [PostController::class, 'store']);
Route::get('/pstApi/show/{id}', [PostController::class, 'show']);
Route::Post('/pstApi/update/{id}', [PostController::class, 'update']);
Route::get('/pstApi/destroy/{id}', [PostController::class, 'destroy']);


// Category rest full api
Route::get('/CategoryApi', [CategoryApiController::class, 'index']);
Route::Post('/CategoryApi/store', [CategoryApiController::class, 'store']);
Route::get('/CategoryApi/show/{id}', [CategoryApiController::class, 'show']);
Route::Post('/CategoryApi/update/{id}', [CategoryApiController::class, 'update']);
Route::get('/CategoryApi/destroy/{id}', [CategoryApiController::class, 'destroy']);

// User rest full api
Route::get('/User', [UserController::class, 'index']);
Route::post('/User/store', [UserController::class, 'store']);
