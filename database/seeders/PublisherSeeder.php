<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisher = new Publisher();
        $publisher->name = 'Penguin';
        $publisher->save();

        $publisher = new Publisher();
        $publisher->name = 'Mangrave';
        $publisher->save();

        $publisher = new Publisher();
        $publisher->name = 'Forge';
        $publisher->save();
    }
}
