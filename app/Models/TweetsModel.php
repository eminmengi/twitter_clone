<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetsModel extends Model
{
    use HasFactory;
    protected $table = 'tweets';

    protected $fillable = ['id','text'];
}
