<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manga_id',
        'volume_id',
        'content',
    ];

    /**
     * Relazione con l'utente (Many-to-One)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione con il manga (Many-to-One, nullable)
     */
    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }

    /**
     * Relazione con il volume (Many-to-One, nullable)
     */
    public function volume()
    {
        return $this->belongsTo(Volume::class);
    }
}
