<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            ['user_id' => '2', 'category_id' => '1', 'title' => 'First Entry', 'description' => 'This my very first entry ever UwU. Im so nervous', 'image' => 'images\beach.jpg'],
            ['user_id' => '3', 'category_id' => '2', 'title' => 'The Moon', 'description' => 'Went on a vacation to the moon. Thats right, the MOON! I can do it because Im filthy rich and I have nothing better to do with my money than spend it on useless leisures. Heck, I even bought a hundred cars just because I was bored. Im spoiled but I try to think that I am humble. Stream Lovesick Girls by BlackPink.', 'image' => 'images\moon.jpg']
        ]);
    }
}
