<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'we_field_of_work',
        'we_company',
        'we_from',
        'we_to',
        'we_desc',
        'we_publish'
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
