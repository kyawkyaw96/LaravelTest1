<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        // $blogs = Blog::latest();
        // if (request('search')) {
        //     $blogs = $blogs->where('title', 'LIKE', '%' . request('search') . '%')
        //         ->orWhere('body', 'LIKE', '%' . request('search') . '%');
        // }
        // return $blogs->get();

        $query = Blog::latest();
        $query->when(request('search' ?? false), function ($query, $search) {
            // $query->where('title', 'LIKE', '%' . $search . '%')
            //     ->orWhere('body', 'LIKE', '%' . $search . '%');
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('body', 'LIKE', '%' . $search . '%');
            });
        });
        $query->when(request('category' ?? false), function ($query, $slug) {
            // $query->where('title', 'LIKE', '%' . $slug . '%')
            //     ->orWhere('body', 'LIKE', '%' . $slug . '%');
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });

        $query->when(request('username' ?? false), function ($query, $username) {
            // $query->where('title', 'LIKE', '%' . $slug . '%')
            //     ->orWhere('body', 'LIKE', '%' . $slug . '%');
            $query->whereHas('user', function ($query) use ($username) {
                $query->where('username', $username);
            });
        });

        return view('blogs.index', [
            // "blog"=>Blog::all(), //no need eager load //blog model ma par p thar
            "blogs" => $query->paginate(6)->withQueryString(), //lazy loading //eager load
        ]);
    }
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlog' => Blog::inRandomOrder()->take(3)->get(),
        ]);
    }
    public function subscriptionHandler(Blog $blog)
    {

        if (User::find(auth()->id())->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        };
        return back();
    }
    public function create()
    {

        return view('blogs.create', ['categories' => Category::all()]);
    }
    public function store()
    {
        $formDate = request()->validate([
            "category_id" => ['required'],
            "title" => ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')],
            "intro" => ['required'],
            "body" => ['required']
        ]);
        // dd($formDate);
        $formDate['user_id'] = auth()->id();
        Blog::create($formDate);
        return redirect('/');
    }
}
