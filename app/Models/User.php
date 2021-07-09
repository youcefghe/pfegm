<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'cover'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getSavedPost(){
        return $this->saved_posts->pluck('post_id');
    }
    public function saved_posts()
    {
        return $this->hasMany(Saved_post::class);
    }
    public function getReportedPost(){
        return $this->reported_posts->pluck('post_id');
    }
    public function reported_posts()
    {
        return $this->hasMany(Reported_post::class);
    }
    public function upPost()
    {
        return $this->hasMany(Post_vote::class,'user_id')->where('type',1);
    }
    public function getUpPost(){
        return $this->upPost->pluck('post_id');
    }
    public function downPost()
    {
        return $this->hasMany(Post_vote::class)->where('type',-1);
    }
    public function getDownPost(){
    return $this->downPost->pluck('post_id');
}
    public function post_votes()
    {
        return $this->hasMany(Post_vote::class);

    }
    public function messages()
    {
        return $this->hasMany(Message::class)->where('read_at',null);
    }
    public function unreadNotifications(){
        return  $this->hasMany(Notification::class,'notifiable_id')->where('read_at',null);
    }
    public function allMessages(){
        return $this->hasMany(Message::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
    public function moderators()
    {
        return $this->belongsTo(Instructor::class);
    }
    public function user_communities()
    {
        return $this->hasMany(User_community::class);
    }
    public function moderator_communities()
    {
        return $this->belongsToMany(Community::class,'user__communities','user_id','community_id')->where(function ($query) {$query->where('role','moderator')->orwhere('role','creator');});
    }

    public function communities()
    {
        return $this->belongsToMany(Community::class,'user__communities','user_id','community_id');
    }
    public function getCommunityIdsAttribute()
    {
        return $this->communities->pluck('id');
    }

}
