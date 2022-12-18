<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('genre');
            $table->string('image')->nullable();
            $table->enum('status',['0','1','2','3'])->default('0')->comment('0 = Available, 1 = Borrowed, 2 = Due, 3 = Booked' );
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('synopsis');
            $table->date('borrow_date')->nullable();
            $table->date('due_date')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
