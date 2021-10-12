<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('books', [BookController::class, 'index']);
// Route::post('books', [BookController::class, 'store']);
// Route::get('books/{id}', [BookController::class, 'show']);
// Route::put('books/{id}', [BookController::class, 'update']);
// Route::delete('books/{id}', [BookController::class, 'destroy']);

// Public Routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']); 
Route::resource('books', BookController::class)->except('create','edit','store','update','delete');
Route::resource('authors', AuthorController::class)->except('create','edit','store','update','delete');

// Private Routes
Route::middleware('auth:sanctum')->group(function() {
    Route::resource('books', BookController::class)->except('create','edit','show','index');
    Route::resource('authors', AuthorController::class)->except('create','edit','show','index');
    Route::post('logout', [AuthController::class, 'logout']);
});