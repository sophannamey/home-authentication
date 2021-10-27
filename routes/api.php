<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\controllers\PostController;
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

//public
//user

Route::post('users',[UserController::class, 'register']);
Route::post('users',[UserController::class, 'login']);

//post
Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{id}',[PostController::class,'show']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    //user
    Route::post('users',[UserController::class, 'logout']);

    //post
    Route::post("posts",[PostController::class,"store"]);
    Route::put("posts/{id}",[PostController::class,"update"]);
    Route::delete("posts/{id}",[PostController::class,"destroy"]);
});

//Public route user
// Route::get('/users',[UserController::class, 'index']);
// Route::get('/users/{id}',[UserController::class,'show']);
// Route::get('/users/search/{name}',[UserControlle::class, 'search']);

//Private route user
// Route::post('/users',[UserController::class, 'store']);
// Route::put('/users/{id}',[UserController::class, 'update']);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);


//Public route post
// Route::get('/posts',[PostController::class, 'index']);
// Route::get('/posts/{id}',[PostController::class,'show']);
// Route::get('/posts/search/{name}',PostController::class, 'search']);

//Private route post
// Route::post('/posts',[PostController::class, 'store']);
// Route::put('/posts/{id}',[PostController::class, 'update']);
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);