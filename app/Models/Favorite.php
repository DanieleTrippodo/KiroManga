<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manga_id',
    ];

    /**
     * Relazione con l'utente (Many-to-One)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione con il manga (Many-to-One)
     */
    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
