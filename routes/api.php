<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApi\v1\DriversConntroller;
use App\Http\Controllers\RestApi\v1\CarConntroller;
use App\Http\Controllers\RestApi\v1\CotegoryConntroller;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('users', DriversConntroller::class);
Route::resource('cars', CarConntroller::class);
Route::resource('kind', CotegoryConntroller::class);
