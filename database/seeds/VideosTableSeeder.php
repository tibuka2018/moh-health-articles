<?php

use Illuminate\Database\Seeder;

use App\Video;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::truncate();
        factory(App\Video::class, 12)->create();
    }
}
