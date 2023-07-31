<?php

use App\Http\Controllers\LineRichMenu\LineRichMangerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::post('abc', function (Request $request) {
    dd($request->file('image'));
});*/

//Route::post('Line/RichMenu',[StoreController::class,'RichMenu']);

//Route::get('Line/Index',[StoreController::class,'Index']);

Route::post('LineRichMenu/Create',[LineRichMangerController::class,'create']);

Route::apiResource('productCategories',ProductController::class);



