<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentionsModel extends Model
{
    use HasFactory;

    protected $table = 'mentions';

    protected $fillable = ['id','user_id','post_id','mention_content'];
}
