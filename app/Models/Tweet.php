<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $table = 'tweets';

    protected $guarded = [];

    public function get_user()
    {
        return $this->hasOne(Post::class, 'id', 'post_id')->with('user');
    }

    public function tweetfav()
    {
        return $this->hasMany(TweetFav::class,'post_id','post_id');
    }

    public function retweet_users()
    {
        return $this->hasMany(Retweet::class, 'tweet_id', 'id')->with('get_user');
    }

}
