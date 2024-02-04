<?php

use App\Models\Blog;
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
        "blogs" => Blog::all(),
    ]);
});
Route::get("/blogs/{blog}", function ($slug) {

    $blog = Blog::find($slug);
    if (!$blog) {
        abort(404);
    }
    return view('blog', [
        'blog' => $blog
    ]);
})->where('blog', '[A-z1-9]+');///whereAlpha,whereAlphaNumeric  p
