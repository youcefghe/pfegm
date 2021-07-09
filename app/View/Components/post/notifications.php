<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class notifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $notifications;
    public function __construct($notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post.notifications');
    }
}
