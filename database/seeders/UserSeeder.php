<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name= "admin";
        $user->role = '0';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('something');
        $user->save();
        
        $user = new User();
        $user->name= "user1";
        $user->role = '1';
        $user->email = 'user1@gmail.com';
        $user->password = Hash::make('something');
        $user->save();

        $user = new User();
        $user->name= "user2";
        $user->role = '1';
        $user->email = 'user2@gmail.com';
        $user->password = Hash::make('something');
        $user->save();

        $user = new User();
        $user->name= "user3";
        $user->role = '1';
        $user->email = 'user3@gmail.com';
        $user->password = Hash::make('something');
        $user->save();
        
    }
}
