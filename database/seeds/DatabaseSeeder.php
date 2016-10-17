<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Article;
use App\Category;
use App\Image;
use App\Section;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::truncate();
        factory(App\User::class, 10)->create();        
        // $this->call(ArticlesTableSeeder::class);
        Article::truncate();
        factory(App\Article::class, 17)->create();        
        // $this->call(CategoriesTableSeeder::class);
        Category::truncate();
        factory(App\Category::class, 10)->create();        
        // $this->call(ImagesTableSeeder::class);
        Image::truncate();
        factory(App\Image::class, 20)->create();        
        // $this->call(SectionsTableSeeder::class);
        Section::truncate();
        factory(App\Section::class, 100)->create();        
    }
}
