<?php

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Database\Seeders\ArticleTagPivotSeeder;
use Database\Seeders\UserFavoriteArticlePivotSeeder;
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
        User::factory(10)->create();
        Article::factory(600)->create();
        Tag::factory(50)->create();

        $this->call([ArticleTagPivotSeeder::class, UserFavoriteArticlePivotSeeder::class]);
    }
}
