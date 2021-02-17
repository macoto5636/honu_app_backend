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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'auth'], function(){
    Route::post('login', [App\Http\Controllers\UserController::class, 'login']);
    Route::post('register', [App\Http\Controllers\UserController::class, 'register']);
    Route::get('logout', [App\Http\Controllers\UserController::class, 'logout'])->middleware('auth:api');
});

Route::group(['prefix'=>'user','middleware' => 'auth:api'], function(){
    Route::post('update/username', [App\Http\Controllers\UserController::class, 'updateUsername']);
    Route::post('update/email', [App\Http\Controllers\UserController::class, 'updateEmail']);
    Route::post('update/password', [App\Http\Controllers\UserController::class, 'updatePassword']);
    Route::post('update/image', [App\Http\Controllers\UserController::class, 'updateImage']);
});

Route::group(['prefix'=>'shop'], function(){
    Route::get('get/{id}', [App\Http\Controllers\ShopController::class, 'getShops']);
});

Route::group(['prefix'=>'friend','middleware' => 'auth:api'], function(){
    Route::get('{id}', [App\Http\Controllers\FriendController::class, 'getUserFriend']);
    Route::post('store', [App\Http\Controllers\FriendController::class, 'addUserFriend']);
    Route::get('delete/{id}', [App\Http\Controllers\FriendController::class, 'deleteUserFriend']);
});

Route::group(['prefix'=>'memory','middleware' => 'auth:api'], function(){
    Route::get('get', [App\Http\Controllers\MemoryController::class, 'getMemories']);
    Route::get('get/other', [App\Http\Controllers\MemoryController::class, 'getOtherMemories']);
    Route::get('delete/{id}', [App\Http\Controllers\MemoryController::class, 'deleteMemory']);
    Route::post('search', [App\Http\Controllers\MemoryController::class, 'searchMemories']);
    Route::post('store',[App\Http\Controllers\MemoryController::class, 'addMemory']);
    Route::get('update/{id}/{num}', [App\Http\Controllers\MemoryController::class, 'updateFavorite']);
});