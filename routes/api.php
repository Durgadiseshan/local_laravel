<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// Route::post('/reverse-me', function (Request $request) {
//     dd($request); 
//     $reversed = strrev($request->input('reverse_this'));
//     return $reversed;
//   });

// Route::post('/endpoint', 'ApiController@handleRequest');


Route::post('/endpoint', [ApiController::class, 'handleRequest']);

