<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class reply extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $reply;

    public function __construct($reply)
    {
        $this->reply = $reply;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post.reply');
    }
}
