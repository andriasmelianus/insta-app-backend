<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
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

Route::group(['as' => 'api'], function () {
    Route::group(['prefix' => 'auth', 'as' => '.auth', 'middleware' => 'jwt'], function () {
        Route::post('login', [AuthController::class, 'login'])->name('.login')->withoutMiddleware('jwt');
        Route::post('register', [AuthController::class, 'register'])->name('.register')->withoutMiddleware('jwt');
        Route::get('user', [AuthController::class, 'me'])->name('.user');
    });

    Route::group(['prefix' => 'post', 'as' => '.post', 'middleware' => 'jwt'], function () {
        Route::get('all', [PostController::class, 'all'])->name('.all');
        Route::post('switch-like', [PostController::class, 'switchLike'])->name('.switch-like');

        Route::post('store', [PostController::class, 'store'])->name('.store');
    });

    Route::group(['prefix' => 'image', 'as' => '.image'], function () {
        Route::get('get/{filepath}', [ImageController::class, 'getImage'])->name('.get');
    });
});
