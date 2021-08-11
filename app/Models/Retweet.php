<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    use HasFactory;

    protected $table = 'retweets';

    protected $guarded = [];

    public function get_tweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'tweet_id')->with('get_user')->with('tweetfav')->with('retweet_users');
    }

    public function get_user()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

}
