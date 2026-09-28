<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // این بخش را به مدل خود اضافه کنید
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    // رابطه با مدل پست
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // رابطه با مدل کاربر
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
