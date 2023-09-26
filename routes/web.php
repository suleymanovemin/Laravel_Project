<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class,"show"])->name("home");





// Login & Register
Route::get('/login', function () {
    return view('login.index');
})->name("login");

Route::post('/login', [UserController::class,"index"])->name("login.auth");

Route::get('/register', [UserController::class,"create"])->name("register.page");


Route::post('/register', [UserController::class,"store"])->name("register");

Route::post('/logout', [UserController::class,"logout"])->name("logout");


// Profile

Route::get("/profile",[UserController::class,"profile"])->middleware("auth")->name("profile");
Route::post("/profile",[UserController::class,"updateProfile"])->middleware("auth")->name("profile.update");
Route::post("/profile/photo",[UserController::class,"updateProfilePhoto"])->middleware("auth")->name("profile.photo");


// Post
Route::get('/new', [PostController::class, "index"])->middleware("auth")->name("new");

Route::get("/post/details/{id}",[PostController::class,"show"])->name("post.details");
Route::post("/post/new",[PostController::class,"store"])->name("post.new");
Route::post("/post/like/{post}",[LikeController::class,"like"])->name("post.like");

// Post comment

Route::post("/comments/add",[CommentController::class,"store"])->name("comment.add");