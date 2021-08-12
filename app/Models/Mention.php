<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    use HasFactory;

    protected $table = 'mentions';

    protected $guarded = [];


    public function get_tweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'tweet_id')->with('get_user')->with('tweetfav')->with('retweet_users');
    }
}
