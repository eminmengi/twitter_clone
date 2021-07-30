<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['id','user_id'];

    public function tweets()
    {
        return $this->hasOne(TweetsModel::class, 'post_id', 'id');
    }

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
