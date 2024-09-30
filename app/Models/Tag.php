<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relazione con i manga (Many-to-Many)
     */
    public function manga()
    {
        return $this->belongsToMany(Manga::class);
    }
}
