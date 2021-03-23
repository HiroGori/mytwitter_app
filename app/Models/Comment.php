<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'tweet_id',
        'body',
    ];

    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }

//    use HasFactory;
}
