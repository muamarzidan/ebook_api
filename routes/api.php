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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books', BookController::class)->except(
    ['create', 'edit']
);
Route::resource('authors', AuthorController::class)->except(
    ['create', 'edit']
);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::get('books', [BookController::class, 'index']);
Route::get('books/{id}', [BookController::class, 'show']);
Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{id}', [AuthorController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {
    Route::Resource('authors', AuthorController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::Resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
});

// Route::get('books', [BookController::class, 'index']);
// Route::get('books/{id}', [BookController::class, 'show']);//detail
// Route::post('books', [BookController::class, 'store']);
// Route::put('books/{id}', [BookController::class, 'update']);
// Route::delete('books/{id}', [BookController::class, 'destroy']);


// Route::get('authors', [AuthorController::class, 'index']);
// Route::get('authors/{id}', [AuthorController::class, 'show']);//detail
// Route::post('authors', [AuthorController::class, 'store']);
// Route::put('authors/{id}', [AuthorController::class, 'update']);
// Route::delete('authors/{id}', [AuthorController::class, 'destroy']);



