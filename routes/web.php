<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;

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


// basic routing
Route::get('/', function () {
    return 'welcome';
});

Route::get('/about', function () {
    $name = "AL AZHAR RIZQI RIFA'I FIRDAUS";
    $nim = "2241720263";
    return "Name: " . $name . "<br> NIM: " . $nim;
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

// Route with parameter
Route::get('/user/{name}', function ($name) {
    return 'My name is ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Post: ' . $postId . ' Comment: ' . $commentId;
});

Route::get('/articles/{id}', function ($id) {
    return 'Article Page with ID: ' . $id;
});

// optional parameter
Route::get('/user/{name?}', function ($name = 'John') {
    return 'My name is ' . $name;
});

// router name
Route::get('/user/profile', function () {
    //
})->name('profile');

Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');

// generating urls...
$url = route('profile');

// generating redirects...
return redirect () -> route('profile');

// Route Group dan Route Prefixes
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second Middleware
    });
Route::get('/user/profile', function () {
    // Uses first & second Middleware
    });
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
    });

// route prefix
Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});