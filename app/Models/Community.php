<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model
{
    use HasFactory;
    use SoftDeletes;
   protected $table= 'communities';
    protected $fillable =[
        'name',
        'type',
        'description',
        'rules',
        'cover',
        'picture',
        'lesson_id'
    ];
    public function moderators(){
        return $this->belongsToMany(User::class,'user__communities','community_id','user_id')->where('user__communities.role','!=','member');
    }
    public function creator(){
        return $this->belongsToMany(User::class,'user__communities','community_id','user_id')->where('user__communities.role','=','creator');
    }
    public function members()
    {
        return $this->belongsToMany(User::class,'user__communities','community_id','user_id')->where('user__communities.role','!=','request')->withTimestamps();
    }
    public function requests(){
        return $this->belongsToMany(User::class,'user__communities','community_id','user_id')->where('user__communities.role','request')->withTimestamps();
    }
    public function posts()
    {
        return $this->hasMany(Post::class,);
    }
    public function user_communities()
    {
        return $this->hasMany(User_community::class);
    }
    public function reported_posts(){
        return $this->belongsToMany(Post::class,'reported_posts','community_id','post_id')->withTimestamps();
    }
    public function getReportedPost(){
        return $this->reported_posts->pluck('id');
    }


}
