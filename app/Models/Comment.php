<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable=[
        'post_id',
        'user_id',
        'content',
        'accepted'
    ];
    public function comment_vote()
    {
        return $this->hasMany(Comment_vote::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
    public function upvotes()
    {
        return $this->hasMany(Comment_vote::class)->where('type',1);
    }
    public function downvotes()
    {
        return $this->hasMany(Comment_vote::class)->where('type',-1);
    }
}
