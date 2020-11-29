<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Category::factory(10)->create();
        Post::factory(10)->create();
        News::factory(10)->create();

        $countCategory = DB::table('categories')->count();
        $countPost = DB::connection('connection2')->table('posts')->count();
        $countNews = DB::connection('connection3')->table('news')->count();

        $this->command->info("Count table (categories) from default database connection: $countCategory");
        $this->command->info("Count table (posts) from connection2 database connection: $countPost");
        $this->command->info("Count table (news) from connection3 database connection: $countNews");
    }
}
