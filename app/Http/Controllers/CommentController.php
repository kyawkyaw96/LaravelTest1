<?php

namespace App\Http\Controllers;

use App\Mail\SubscribersMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => ['required']
        ]);


        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id(),
            // 'name'=>auth()->username()
        ]);
        $subscribersMails = $blog->subscribers->filter(function ($subscribers) {
            return $subscribers->id !== auth()->id();
        });
        $subscribersMails->each(function ($subscribersMail) use ($blog) {
            Mail::to($subscribersMail)->queue(new SubscribersMail($blog));
        });
        return redirect("/blogs/$blog->slug");
    }
}
