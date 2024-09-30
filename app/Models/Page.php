<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'volume_id',
        'page_number',
        'image_path',
    ];

    /**
     * Relazione con il volume (Many-to-One)
     */
    public function volume()
    {
        return $this->belongsTo(Volume::class);
    }
}
