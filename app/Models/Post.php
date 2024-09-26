<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'is_published', 'published_at'];
    public function user()
    {
        // Using the `belongsTo` relationship to get the user who created the posts
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        // Using the `hasMany` relationship to get all comments for a posts
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        // Using the `belongsToMany` relationship to get all tags associated with a posts
        return $this->belongsToMany(Tag::class);
    }
}


