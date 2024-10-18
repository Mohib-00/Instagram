<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReelController;
use App\Http\Controllers\StoryController;
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

//seeallusers page
Route::get('/seeallusers', [ApiController::class, 'seeallusers'])->name('seeallusers');

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

// message page
Route::get('/message', [ApiController::class, 'message'])->name('message');

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

//to delete like
Route::delete('/likes/destroy', [ReelController::class, 'destroy'])->name('likes.destroy');

//to follow user
Route::post('/follow', [FollowController::class, 'follow'])->name('follow');

//to unflow user
Route::post('/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');

//to confirm request
Route::post('/confirm-request/{id}', [FollowController::class, 'confirmFollowRequest']);

//to delete request 
Route::delete('/delete-request/{id}', [FollowController::class, 'deleteRequest']);

//to store story
Route::post('/save-story', [StoryController::class, 'store']);

//to get user story
Route::get('/user-stories/{userId}', [StoryController::class, 'getUserStories']);

//to send message
Route::post('/send-message', [MessageController::class, 'sendMessage']);

//to get message
Route::get('/message/{id}', [MessageController::class, 'getMessages'])->name('messages.get');

//to get user data with message
Route::get('/user/{id}', [MessageController::class, 'show']);

//to get interval messages
Route::get('getConversations', [MessageController::class, 'getConversations'])->name('getConversations');