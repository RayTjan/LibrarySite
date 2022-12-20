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
        $user->name= "Ray Ray";
        $user->role = '1';
        $user->email = 'user1@gmail.com';
        $user->password = Hash::make('something');
        $user->save();

        $user = new User();
        $user->name= "John Doe";
        $user->role = '1';
        $user->email = 'johndoe@gmail.com';
        $user->password = Hash::make('something');
        $user->save();

        $user = new User();
        $user->name= "Jane Smith";
        $user->role = '1';
        $user->email = 'Jane Smith@gmail.com';
        $user->password = Hash::make('something');
        $user->save();
        
    }
}
