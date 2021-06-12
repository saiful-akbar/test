<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Sosmed;
use App\Models\Profile;
use App\Models\Education;
use App\Models\WorkExperience;
use Illuminate\Notifications\Notifiable;
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
     * Merubah format created_at
     */
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    /**
     * Merubah format updated_at
     */
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

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

    /**
     * Relasi one to one dengan model Education
     */
    public function education()
    {
        return $this->hasOne(Education::class, "user_id", "id");
    }

    /**
     * Relasi one to one dengan model WorkEcperience
     */
    public function workExperience()
    {
        return $this->hasOne(WorkExperience::class, "user_id", "id");
    }
}
