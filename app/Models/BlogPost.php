<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category', 'author_id'];

    // Relationship: A blog post belongs to a user
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
        
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
