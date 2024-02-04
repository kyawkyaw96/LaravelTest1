<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;

    public function __construct($title,  $slug, $intro, $body, $date)
    {
        $this->title = $title;
        $this->intro = $intro;
        $this->slug = $slug;
        $this->body = $body;
        $this->date = $date;
    }

    public static function all()
    {
        // $files = File::files(resource_path("blogs"));
        // dd($obj->title);
        // $blogs = [];
        // foreach ($files as $file) {
        //     $obj = YamlFrontMatter::parseFile($file);
        //     $blog = new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
        //     $blogs[] = $blog;
        // };
        // return $blogs;
        return collect(File::files(resource_path("blogs")))->map(function ($file) {
            $obj = YamlFrontMatter::parseFile($file);
            return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body(), $obj->date);
        })->sortBy('date');

        // $blogs = array_map(function ($file) {
        //     return  YamlFrontMatter::parseFile($file);
        // }, $files);
        // return $blogs;
    }
    public static function find($slug)
    {

        return static::all()->firstWhere('slug', $slug);


        // $path = resource_path("/blogs/$slug.html");
        // if (!file_exists($path)) {
        //     return 'hello';
        //     return redirect('/');
        // }
        // return cache()->remember("posts.$slug", 120, function () use ($path) {
        //     return 'hello';

        //     return file_get_contents($path);
        // });
        //remember(1,2,3) 1=file name ,2=time ,3=function
    }
}
