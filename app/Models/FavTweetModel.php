<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavTweetModel extends Model
{
    use HasFactory;

    protected $table = 'fav_tweet';

    protected $fillable = ['id','user_id','post_id'];
}
