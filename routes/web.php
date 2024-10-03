<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\ReelController;
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

//edit page
Route::get('/edit', [ApiController::class, 'edit'])->name('edit');

//posts page
Route::get('/posts', [ApiController::class, 'posts'])->name('posts');

// reels page
Route::get('/reelss', [ApiController::class, 'openreels'])->name('reelss');

//Logout
Route::post("logout",[ApiController::class,"logout"]);

});


//route for upload user image 
Route::post('/upload-profile-image', [ApiController::class, 'uploadProfileImage']);

//route to remove user image 
Route::delete('/remove-image', [ApiController::class, 'removeImage'])->name('remove.image');

Route::post('/user-profile', [ApiController::class, 'update']);

//route to store reel
Route::post('/reels', [ReelController::class, 'store'])->name('reels.store');

Route::post('/save', [ReelController::class, 'save'])->name('comments.store');

//to get comments
Route::get('/reels/{id}/comments', [ReelController::class, 'getComments'])->name('comments.get');

//to save likes
Route::post('/likes/store', [ReelController::class, 'storelikes'])->name('likes.store');
 
