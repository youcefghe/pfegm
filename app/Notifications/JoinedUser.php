<?php

namespace App\Notifications;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JoinedUser extends Notification implements ShouldBroadcast
{


    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $message;
    public $url;
    public $picture;
    public function __construct($message,$url,$picture)
    {
        $this->message = $message;
        $this->url = $url;
        $this->picture = $picture;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) : array
    {
        return ['broadcast','database'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'url' => $this->url,
            'picture'=>$this->picture
        ];
    }
    public function getData()
    {
        return [
            'message' => $this->message,
            'picture'=>$this->picture
        ];
    }
    public function getUrl()
    {
        return $this->url;
    }
   // public function toBroadcast($notifiable){
    //     return  [
    //         'user_id' => $this->user_id,
    //         'content' => $this->content
    //       ];
    // }
    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'message' => $this->message,
            'url' => $this->url,
            'picture'=>$this->picture
        ]);
    }

}
