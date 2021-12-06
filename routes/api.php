<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;

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
Route::post('/register',[AuthController::class, 'register']);
Route::post('/logout',[AuthController::class, 'logout']);
Route::post('/login',[AuthController::class, 'login']);
Route::get('/members',[MemberController::class, 'index']);
//Route::post('/members',[MemberController::class, 'store']);
//Route::put('/members/{id}',[MemberController::class, 'update']);
//Route::delete('/members/{id}',[MemberController::class, 'destroy']);
Route::get('/members/{id}',[MemberController::class, 'show']);
Route::get('/members/search/{name}',[MemberController::class, 'search']);
Route::group(['middleware' => ['auth:sanctum']], function () {
   Route::post('/members',[MemberController::class, 'store']);
   Route::put('/members/{id}',[MemberController::class, 'update']);
   Route::delete('/members/{id}',[MemberController::class, 'destroy']);

});