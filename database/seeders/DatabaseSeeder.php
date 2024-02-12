<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        User::factory()->create();

        Category::truncate();
        $frontend = Category::factory()->create(['name' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend']);


        Blog::truncate();
        Blog::factory(3)->create(['category_id' => $frontend]);
        Blog::factory(3)->create(['category_id' => $backend]);
    }
}
