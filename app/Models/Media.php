<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    use HasFactory;
    protected $fillable=[
        'post_id',
        'link'
    ];
}
