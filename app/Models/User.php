<?php

namespace App\Models;

use App\Models\Sosmed;
use App\Models\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Relasi one to one dengan model Profile
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, "user_id", "id");
    }
    /**
     * Relasi one to one dengan model Sosmed
     */
    public function sosmed()
    {
        return $this->hasOne(Sosmed::class, "user_id", "id");
    }
}
