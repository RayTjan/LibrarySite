<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $comic = new Comic();
        $comic->name='The Midnight Library';
        $comic->genre='Fiction';
        $comic->synopsis='lorem ipsum dolor';
        $comic->save();

        $comic = new Comic();
        $comic->name='Zero to One';
        $comic->genre='Informative';
        $comic->synopsis='lorem ipsum dolor';
        $comic->user_id = 2;
        $comic->borrow_date = Carbon::parse('2000-01-01');
        $comic->due_date = Carbon::parse('2000-01-08');
        $comic->status = 2;
        $comic->save();

        $comic = new Comic();
        $comic->name='Investing 101';
        $comic->genre='Informative';
        $comic->synopsis='lorem ipsum dolor';
        $comic->user_id = 2;
        $comic->borrow_date = Carbon::parse('2000-01-05');
        $comic->due_date = Carbon::parse('2000-01-12');
        $comic->status = 2;
        $comic->save();

        $comic = new Comic();
        $comic->name='The Power of Habit';
        $comic->genre='Motivational';
        $comic->synopsis='lorem ipsum dolor';
        $comic->status = 1;
        $comic->save();
    }
}
