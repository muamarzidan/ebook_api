<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('coba', function () {
    return "Hello World";
});

Route::get('coba1', function () {
    return [
        "name" => "Muamar Zidan Tri Antoro",
        "kelas" => "XII RPL 4",
        "No" => "28"
    ];
}, 201);

Route::get('coba2', function () {
    return response()->json([
        'message' => 'data berhasil di temukan',
        'data' => [
            'id' => rand(1,25),
            'nis' => '3103120136',
            'name' => 'Muamar Zidan Tri Antoro',
            'phone' => '081234567890',
            'class' => 'XII RPL 4',
        ]
    ],  201);
});


//Route contoller data Auth
// Route::post('/me', 'App\Http\Controllers\AuthController@create');
// Route::get('/me', 'App\Http\Controllers\AuthController@index');
// Route::delete('/me', 'App\Http\Controllers\AuthController@destroy');
// Route::put('/me', 'App\Http\Controllers\AuthController@update');



