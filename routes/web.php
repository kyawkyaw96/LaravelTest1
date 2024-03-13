<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', [BlogController::class, 'index']);
Route::get("/blogs/{blog:slug}", [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+'); ///whereAlpha,whereAlphaNumeric  p
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::post("/blogs/{blog:slug}/subscription", [BlogController::class, 'subscriptionHandler']);
Route::get('admin/blogs/create', [BlogController::class, 'create'])->middleware('admin');
Route::post('admin/blogs/store', [BlogController::class, 'store'])->middleware('admin');

// Route::get("/users/{user:username}", function (User $user) {
//     return view('blogs', [
//         "blogs" => $user->blogs->load('category', 'user'),
//         "categories" => Category::all(),

//     ]);
// });
