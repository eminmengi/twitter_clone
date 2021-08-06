<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetFav extends Model
{
    use HasFactory;

    protected $table = 'tweet_favs';

    protected $guarded = [];
}
