<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Published;

class PusblishedSeeder extends Seeder
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
        $published->name = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->name = 'Jane Mangrave';
        $published->published_id = 2;
        $published->published_type = 'App\Models\Book';
        $published->year_published = '2000';
        $published->save();

        $publisher = new Published();
        $published->name = 'Mark Forge';
        $published->published_id = 3;
        $published->published_type = 'App\Models\Book';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->published_id = 4;
        $published->published_type = 'App\Models\Book';
        $published->name = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->name = 'Jane Mangrave';
        $published->published_id = 1;
        $published->published_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        $publisher = new Published();
        $published->name = 'Mark Forge';
        $published->published_id = 2;
        $published->published_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->published_id = 3;
        $published->published_type = 'App\Models\Book';
        $published->name = 'John Penguin';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->name = 'Jane Mangrave';
        $published->published_id = 4;
        $published->published_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        
    }
}
