<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_background',
        'article_url',
        'article_title',
        'article_subtitle',
        'article_publish',
    ];
}
