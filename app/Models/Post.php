<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $guarded = [];

    public function tweet()
    {
        return $this->hasOne(Tweet::class, 'post_id', 'id');
    }
    public function retweet()
    {
        return $this->hasOne(Retweet::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function tweetfav()
    {
        return $this->hasMany(TweetFav::class,'post_id','id');
    }
}
