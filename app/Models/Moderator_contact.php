<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moderator_contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'body',
        'user_id',
        'subject',
        'sender_mail'
    ];

}
