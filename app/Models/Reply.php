<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable = [

        'content',
        'user_id',
        'comment_id'
    ];
    public function author(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
