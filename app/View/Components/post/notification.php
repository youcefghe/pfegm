<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $notification;
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post.notification');
    }
}
