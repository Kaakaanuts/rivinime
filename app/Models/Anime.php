<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = [
        'title',
        'type',
        'slug',
        'review',
        'rating',
        'cover_image',
        'release_year',
        'status',
        'is_recommended',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function studios()
    {
        return $this->belongsToMany(Studio::class);
    }
}
