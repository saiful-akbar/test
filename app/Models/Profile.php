<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "profile_avatar",
        "profile_first_name",
        "profile_last_name",
        "profile_date_of_birth",
        "profile_month_of_birth",
        "profile_year_of_birth",
        "profile_phone",
        "profile_street",
        "profile_city",
        "profile_country",
        "profile_website",
        "profile_email",
    ];

    /**
     * Relasi one to one dengan model Profile
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

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
}
