<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
































































































Route::resource('menus', App\Http\Controllers\API\MenuAPIController::class);





Route::resource('faqs', App\Http\Controllers\API\FaqAPIController::class);


Route::resource('white_labels', App\Http\Controllers\API\WhiteLabelAPIController::class);
