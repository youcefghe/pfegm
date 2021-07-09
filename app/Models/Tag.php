<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];
    public function tag_posts()
    {
        return $this->belongsToMany(Post::class,'post_tags','tag_id','post_id')->withTimestamps();
    }
    public function getPostIdsAttribute()
    {
        return $this->tag_posts->pluck('id');
    }
}
