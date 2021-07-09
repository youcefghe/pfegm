<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'community_id',
        'solved',
        'element_id'
    ];
    public function community(){
        return $this->belongsTo(Community::class,'community_id');
    }
    public function saved_posts()
    {
        return $this->hasMany(Saved_post::class);
    }
    public function reported_posts()
    {
        return $this->hasMany(Reported_post::class);
    }

    public function upvotes()
    {
        return $this->hasMany(Post_vote::class)->where('type',1);
    }
    public function downvotes()
    {
        return $this->hasMany(Post_vote::class)->where('type',-1);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function post_tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id')->withTimestamps();
    }
    public function medias()
    {
        return $this->hasMany(Media::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
