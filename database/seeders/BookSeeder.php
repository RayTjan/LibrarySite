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
        $book->synopsis=
        'Matt Haigs unique novel The Midnight Library ponders the infinite possibilities of life. It is about a young woman named Nora Seed, who lives a monotonous, ordinary life and feels unwanted and unaccomplished. One night, her despair reaches a peak and she commits suicide.';
        $book->save();

        $book = new Book();
        $book->name='Zero to One';
        $book->genre='Informative';
        $book->synopsis=
        'Zero To One is an inside look at Peter Thiels philosophy and strategy for making your startup a success by looking at the lessons he learned from founding and selling PayPal, investing in Facebook and becoming a billionaire in the process';
        $book->user_id = 2;
        $book->borrow_date = Carbon::parse('2000-01-01');
        $book->due_date = Carbon::parse('2000-01-08');
        $book->status = 2;
        $book->save();

        $book = new Book();
        $book->name='Investing 101';
        $book->genre='Informative';
        $book->synopsis = 'A crash course in managing personal wealth and building a profitable portfolio—from stocks and bonds to IPOs and more!';
        $book->user_id = 4;
        $book->borrow_date = Carbon::parse('2000-01-05');
        $book->due_date = Carbon::parse('2000-01-12');
        $book->status = 3;
        $book->save();

        $book = new Book();
        $book->name='The Power of Habit';
        $book->genre='Motivational';
        $book->synopsis='The power of habit is a digestible and informed examination of why habits exist, how they work, and how you can change them. This book will give you the foundational understanding required to create new habits that will drive your success and break old habits that are limiting your life.
        ';
        $book->status = 4;
        $book->user_id = 3;
        $book->save();

        $book = new Book();
        $book->name='Harry Potter and The Philosophers Stone';
        $book->genre='Fiction, Fantasy';
        $book->synopsis='
        Harry Potter, an eleven-year-old orphan, discovers that he is a wizard and is invited to study at Hogwarts. Even as he escapes a dreary life and enters a world of magic, he finds trouble awaiting him.';
        $book->status = 4;
        $book->user_id = 2;
        $book->save();

        $book = new Book();
        $book->name='Avatar';
        $book->genre='Fiction, Sci-fi';
        $book->synopsis='
        On the lush alien world of Pandora live the Navi, beings who appear primitive but are highly evolved. Because the planets environment is poisonous, human/Navi hybrids, called Avatars, must link to human minds to allow for free movement on Pandora. Jake Sully (Sam Worthington), a paralyzed former Marine, becomes mobile again through one such Avatar and falls in love with a Navi woman (Zoe Saldana). As a bond with her grows, he is drawn into a battle for the survival of her world.';
        $book->status = 1;
        $book->save();

        $book = new Book();
        $book->name='The Hunger Games';
        $book->genre='Fiction, Sci-fi';
        $book->synopsis='
        The Hunger Games is an annual event in which one boy and one girl aged 12–18 from each of the twelve districts surrounding the Capitol are selected by lottery to compete in a televised battle royale to the death';
        $book->status = 1;
        $book->save();

        $book = new Book();
        $book->name='The Subtle Art of Not Giving a F*ck';
        $book->genre='Non-fiction';
        $book->synopsis='
        The Subtle Art of Not Giving a F*ck argues that individuals should seek to find meaning through what they find to be important and only engage in values that they can control. Values (such as popularity) that are not under a persons control, are, according to the book, bad values';
        $book->status = 2;
        $book->user_id = 2;
        $book->borrow_date = Carbon::parse('2022-12-19');
        $book->due_date = Carbon::parse('2022-12-26');
        $book->save();

        $book = new Book();
        $book->name='Tribe of Mentors';
        $book->genre='Non-fiction';
        $book->synopsis='     
        Tim Ferriss, the #1 New York Times best-selling author of The 4-Hour Workweek, shares the ultimate choose-your-own-adventure book—a compilation of tools, tactics, and habits from 130+ of the worlds top performers.';
        $book->status = 4;
        $book->user_id = 2;
        $book->save();
    }
}
