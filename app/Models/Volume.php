<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;

    protected $fillable = [
        'manga_id',
        'volume_number',
        'title',
    ];

    /**
     * Relazione con il manga (Many-to-One)
     */
    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }

    /**
     * Relazione con le pagine (One-to-Many)
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Relazione con i commenti (One-to-Many)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
