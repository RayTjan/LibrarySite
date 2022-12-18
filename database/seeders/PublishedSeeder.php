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
        $published->published_id = 1;
        $published->published_type = 'App\Models\Book';
        $published->author = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->author = 'Jane Mangrave';
        $published->published_id = 2;
        $published->published_type = 'App\Models\Book';
        $published->year_published = '2000';
        $published->save();

        $publisher = new Published();
        $published->author = 'Mark Forge';
        $published->published_id = 3;
        $published->published_type = 'App\Models\Book';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->published_id = 4;
        $published->published_type = 'App\Models\Book';
        $published->author = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->author = 'Jane Mangrave';
        $published->published_id = 1;
        $published->published_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        $publisher = new Published();
        $published->author = 'Mark Forge';
        $published->published_id = 2;
        $published->published_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->published_id = 3;
        $published->published_type = 'App\Models\Book';
        $published->author = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->author = 'Jane Mangrave';
        $published->published_id = 4;
        $published->published_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        
    }
}