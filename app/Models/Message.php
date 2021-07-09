<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content',
        'from_id',
        'subject',
        'read_at',
        'sender'
    ];
    protected $casts = [
        'sender' => 'array'
    ];
}
