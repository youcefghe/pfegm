<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User_community extends Model
{
    protected $table = 'user__communities';
    use HasFactory;
    use softDeletes;
    protected $fillable=[
      'user_id',
      'community_id',
      'role'
    ];
    public function community(){
        return $this->belongsTo(Community::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
