<?php

use App\Http\Controllers\BlogController;
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


// Route::get("/users/{user:username}", function (User $user) {
//     return view('blogs', [
//         "blogs" => $user->blogs->load('category', 'user'),
//         "categories" => Category::all(),

//     ]);
// });
