<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'intro', 'slug', 'user_id', 'category_id']; //protected $guarded=[];

    protected $with = ['category', 'user']; //eager load or lazy loading//web.php mar eager load ma lo top bu

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function subscribers()
    {
        return $this->belongsToMany(User::class);
    }
    public function unSubscribe()
    {
        return $this->subscribers()->detach(auth()->id());
    }
    public function subscribe()
    {
        return $this->subscribers()->attach(auth()->id());
    }
}
