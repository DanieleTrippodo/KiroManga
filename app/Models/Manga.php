<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
    ];

    /**
     * Relazione con i volumi (One-to-Many)
     */
    public function volumes()
    {
        return $this->hasMany(Volume::class);
    }

    /**
     * Relazione con i tag (Many-to-Many)
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Relazione con i commenti (One-to-Many)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relazione con i preferiti (One-to-Many)
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
