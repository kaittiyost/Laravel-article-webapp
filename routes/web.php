<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Post\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/admin",function(){
    return view('admin');
});

Route::get("/users/{user_id}",function($user_id){
    return 'routes for user_id = '.$user_id;
});

Route::get("/auth/register",[AuthController::class,"register"]);
Route::post("/auth/register",[AuthController::class,"storeRegister"]);

Route::get("/auth/login",[AuthController::class,"login"])->name('login');
Route::post("/auth/login",[AuthController::class,"checkLogin"]);

Route::get("/auth/logout",[AuthController::class,"logout"]);

Route::get("/users",[UserController::class,'index']);

Route::get("/posts",[PostController::class,'index'])->middleware('auth');
Route::get("/posts/create",[PostController::class,'create'])->middleware('auth');
Route::post("/posts",[PostController::class,'store'])->middleware('auth');
Route::get("/posts/{post_id}/edit",[PostController::class,'edit'])->middleware('auth');
Route::patch("/posts/{post_id}",[PostController::class,'update'])->middleware('auth');
Route::delete("/posts/{post_id}",[PostController::class,'delete'])->middleware('auth');

Route::get("/home",[AuthController::class,"home"])->middleware('auth');
Route::get("/auth/show/{name}",[AuthController::class,"index"]);