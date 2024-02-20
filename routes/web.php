<?php

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

Route::get('/', function () {
    return view('blogs', [
        // "blog"=>Blog::all(), //no need eager load //blog model ma par p thar
        "blogs" => Blog::latest()->get(), //lazy loading //eager load
        "categories" => Category::all(),
    ]);
});
Route::get("/blogs/{blog:slug}", function (Blog $blog) {
    return view('blog', [
        'blog' => $blog,
        'randomBlog' => Blog::inRandomOrder()->take(3)->get(),
    ]);
})->where('blog', '[A-z\d\-_]+'); ///whereAlpha,whereAlphaNumeric  p

Route::get("/categories/{category:slug}", function (Category $category) {
    return view('blogs', [
        // "blogs" => $category->blogs->load('category', 'user'),
        "blogs" => $category->blogs,
        "categories" => Category::all(),
        'currentCategory' => $category,

    ]);
});
Route::get("/users/{user:username}", function (User $user) {
    return view('blogs', [
        "blogs" => $user->blogs->load('category', 'user'),
        "categories" => Category::all(),

    ]);
});
