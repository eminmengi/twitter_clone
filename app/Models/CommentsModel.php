<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = ['id','user_id','post_id','comment'];
}