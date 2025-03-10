<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = ['password'];

    // JWT Authentication Methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // Relationship: One user can have many blog posts
    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'author_id');
    }
}
