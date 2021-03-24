<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

/*    public function tweetLikes()
    {
        return $this->hasMany('App\Models\TweetLike');
    }
*/
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
