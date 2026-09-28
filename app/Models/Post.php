<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'Posts';

    protected $fillable = [
        'title',
        'description',
        'imagename',
        'likes_count',
        'date',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');

    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy($user): bool
    {
        return $user
            ? $this->likes()->where('user_id', $user->id)->exists()
            : false;
    }
}
