<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'user_id',
        'body',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tweetLikes()
    {
        return $this->hasMany('App\TweetLike');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

//    use HasFactory;
}
