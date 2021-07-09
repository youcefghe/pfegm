<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'notifiable_id',
        'picture',
        'type',
        'notifiable_type'
    ];
    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->forceFill(['read_at' => Carbon::now()])->save();
        }
    }

}
