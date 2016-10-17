<?php

use Illuminate\Database\Seeder;

use App\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::truncate();
        factory(App\Section::class, 100)->create();
    }
}
