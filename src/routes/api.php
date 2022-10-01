<?php

use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use App\Http\Controllers\UserController;
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

Route::prefix('auth')->group(function() {
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('user')->middleware('auth:sanctum')->group(function() {
    Route::get('/', [UserController::class, 'getLoggedInUser'])->name('get-logged-in-user');
    Route::post('/share', [UserController::class, 'shareLoggedInUser'])->name('share-logged-in-user');
});
