<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sosmed_name', 'sosmed_url', 'sosmed_icon'];

    /**
     * Relasi one to one dengan model Profile
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
