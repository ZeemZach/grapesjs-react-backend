<?php

use App\Http\Controllers\Api\TemplatesApiController;
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
Route::group(['prefix' => 'v1'], function () {
    Route::get('template',[TemplatesApiController::class,'index']);
    Route::post('template',[TemplatesApiController::class,'store']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


