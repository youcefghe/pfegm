<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reported_post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'community_id',
        'details'
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
