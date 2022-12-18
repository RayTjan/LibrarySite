<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Published extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'publishedable_id',
        'publishedable_type',
        'author',
        'year_published',
    ];

    public function publishedable()
    {
        return $this->morphTo();
    }
}
