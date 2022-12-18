<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
        'status',
        'genre',
        'synopsis',
        'user_id',
        'borrow_date',
        'due_date',
    ];

    public function publishers()
    {
        return $this->morphMany(Published::class, 'publishedable');
    }
}
