<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $book = new Book();
        $book->name='The Midnight Library';
        $book->genre='Fiction';
        $book->synopsis='lorem ipsum dolor';
        $book->save();

        $book = new Book();
        $book->name='Zero to One';
        $book->genre='Informative';
        $book->synopsis='lorem ipsum dolor';
        $book->user_id = 2;
        $book->borrow_date = Carbon::parse('2000-01-01');
        $book->due_date = Carbon::parse('2000-01-08');
        $book->status = 2;
        $book->save();

        $book = new Book();
        $book->name='Investing 101';
        $book->genre='Informative';
        $book->synopsis='lorem ipsum dolor';
        $book->user_id = 2;
        $book->borrow_date = Carbon::parse('2000-01-05');
        $book->due_date = Carbon::parse('2000-01-12');
        $book->status = 2;
        $book->save();

        $book = new Book();
        $book->name='The Power of Habit';
        $book->genre='Motivational';
        $book->synopsis='lorem ipsum dolor';
        $book->status = 1;
        $book->save();
        
    }
}
