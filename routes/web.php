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

//Profile    
Route::get("home",[ApiController::class,"home"]);
//Logout
Route::post("logout",[ApiController::class,"logout"]);

});

 
