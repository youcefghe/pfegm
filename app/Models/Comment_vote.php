<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_vote extends Model
{
    protected $table = 'comment_votes';
    use HasFactory;
    protected $fillable = [
        'comment_id',
        'user_id',
        'type'
    ];
}
