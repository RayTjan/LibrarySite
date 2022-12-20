<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ObjectInterface;

class Book extends Model implements ObjectInterface
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
	/**
	 * @return mixed
     * return all books
	 */
	public function getAll() {
        return Book::all();
	}
	
	/**
	 * @return mixed
     * return book name
	 */
	public function getName($id) {
        return Book::find($id)->name;
	}
	
	/**
	 * @return mixed
     * return user
	 */
	public function getrelationshipdata() {
        return $this->belongsTo(User::class, 'user_id','id');
	}

    /**
	 * @return mixed
     * return author and year published
	 */
    public function publishers()
    {
        return $this->morphMany(Published::class, 'publishedable');
    }

    
}
