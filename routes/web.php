<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {
    return view('welcome');
});

//register
Route::post("register",[ApiController::class,"register"]);
//Login
Route::post("login",[ApiController::class,"login"]);

Route::group([
    "middleware" => ["auth:sanctum"]
],function(){

//User Page    
Route::get("home",[ApiController::class,"home"]);

//Admin Page    
Route::get("admin",[ApiController::class,"admin"]);

//profile page
Route::get('/profile', [ApiController::class, 'profile'])->name('profile');

//posts page
Route::get('/posts', [ApiController::class, 'posts'])->name('posts');

//Logout
Route::post("logout",[ApiController::class,"logout"]);

});

 
