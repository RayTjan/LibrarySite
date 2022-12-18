<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Interface\ObjectInterface;


class User extends Authenticatable implements ObjectInterface
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	/**
	 * @return mixed
	 */
	public function getAll() {
        return User::all();
	}
	
	/**
	 * @return mixed
	 */
	public function getName($id) {
        return User::find($id)->name;
	}
	
	/**
	 * @return mixed
	 */
	public function getrelationshipdata() {
        return $this->hasMany(Book::class, 'user_id', 'id');
	}
}
