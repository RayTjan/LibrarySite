<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'genre',
        'synopsis',
        'year_published',
        'peminjam_id',
        'borrow_date',
        'due_date',
    ];

    public function borrower(){
        return $this->belongsTo(User::class);
    }
}
