<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Published;

class PublishedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $published = new Published();
        $published->publishedable_id = 1;
        $published->publishedable_type = 'App\Models\Book';
        $published->author = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->publishedable_id = 2;
        $published->publishedable_type = 'App\Models\Book';
        $published->author = 'Jane Magrave';
        $published->year_published = '2050';
        $published->save();

        //to prove polymorphism
        $published = new Published();
        $published->publishedable_id = 1;
        $published->publishedable_type = 'App\Models\Book';
        $published->author = 'Marbles Sparkle';
        $published->year_published = '2010';
        $published->save();



        $publisher = new Published();
        $published->author = 'Mark Forge';
        $published->publishedable_id = 3;
        $published->publishedable_type = 'App\Models\Book';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->publishedable_id = 4;
        $published->publishedable_type = 'App\Models\Book';
        $published->author = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->author = 'Jane Mangrave';
        $published->publishedable_id = 1;
        $published->publishedable_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        $publisher = new Published();
        $published->author = 'Mark Forge';
        $published->publishedable_id = 2;
        $published->publishedable_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->publishedable_id = 3;
        $published->publishedable_type = 'App\Models\Book';
        $published->author = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->author = 'Jane Mangrave';
        $published->publishedable_id = 4;
        $published->publishedable_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        
    }
}
