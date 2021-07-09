<?php

namespace App\Notifications;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newMessage extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $content;
    public $subject;
    public $sender;
    public $picture;
    public function __construct($sender,$subject,$content,$picture)
    {
        $this->sender =$sender;
        $this->subject =$subject;
        $this->content = $content;
        $this->picture = $picture;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }
    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'sender' => $this->sender,
            'subject'=>$this->subject,
            'content'=>$this->content,
            'picture'=>$this->picture
        ]);
    }
}
