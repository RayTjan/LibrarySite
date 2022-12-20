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
        $published->year_published = '2002';
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
        $published->year_published = '2006';
        $published->save();

        $published = new Published();
        $published->publishedable_id = 4;
        $published->publishedable_type = 'App\Models\Book';
        $published->author = 'John Penguin';
        $published->year_published = '2011';
        $published->save();

        $published = new Published();
        $published->author = 'Jane Mangrave';
        $published->publishedable_id = 1;
        $published->publishedable_type = 'App\Models\Comic';
        $published->year_published = '2020';
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
        $published->year_published = '2010';
        $published->save();

        $published = new Published();
        $published->author = 'Jane Mangrave';
        $published->publishedable_id = 4;
        $published->publishedable_type = 'App\Models\Comic';
        $published->year_published = '2000';
        $published->save();

        $published = new Published();
        $published->author = 'J.K. Rowlings';
        $published->publishedable_id = 5;
        $published->publishedable_type = 'App\Models\Book';
        $published->year_published = '2001';
        $published->save();

        $published = new Published();
        $published->author = 'R.R. George Martin';
        $published->publishedable_id = 5;
        $published->publishedable_type = 'App\Models\Book';
        $published->year_published = '2017';
        $published->save();

        $published = new Published();
        $published->author = 'Suzanne Cottails';
        $published->publishedable_id = 6;
        $published->publishedable_type = 'App\Models\Book';
        $published->year_published = '2010';
        $published->save();

        $published = new Published();
        $published->author = 'Daniel Carnegie';
        $published->publishedable_id = 7;
        $published->publishedable_type = 'App\Models\Book';
        $published->year_published = '2005';
        $published->save();

        $published = new Published();
        $published->author = 'Mark Manson';
        $published->publishedable_id = 8;
        $published->publishedable_type = 'App\Models\Book';
        $published->year_published = '2012';
        $published->save();

        $published = new Published();
        $published->author = 'Tim Ferris';
        $published->publishedable_id = 9;
        $published->publishedable_type = 'App\Models\Book';
        $published->year_published = '2019';
        $published->save();


        
    }
}
