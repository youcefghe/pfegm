<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'type'
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
