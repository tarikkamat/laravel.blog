<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $articles2 = \App\Models\Article::factory(5)->create([
            'title' => fake()->text(15),
            'slug' => fake()->unique()->slug(),
            'content' => fake()->text(),
            'image_path' => 'lorem.png',
            'status' => 'active',
        ]);

        $cateogries = \App\Models\Category::factory(4)->create();
        $articles = \App\Models\Article::factory(10)->create();
        $tags = \App\Models\Tag::factory(10)->create();
        \App\Models\Comment::factory(30)->create();


        \App\Models\User::factory()->create([
            'name' => 'Demo Admin',
            'username' => 'demo_admin',
            'password' => '$2a$12$Ng10p2jor5QJbtdvtzHy0ui3EJu1kzZvL6Yg83OmVRhZXBszR41/2'
        ]);


        // $articles->first()->categories()->attach($cateogries);

        foreach ($articles as $article) {
            $article->categories()->attach($cateogries);
            $article->tags()->attach($tags);
        }

        foreach ($articles2 as $article) {
            $article->categories()->attach(rand(1,4));
            $article->tags()->attach($tags);
        }


    }
}
