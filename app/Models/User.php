<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Aggiungi 'role' ai campi fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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
