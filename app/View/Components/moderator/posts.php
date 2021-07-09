<?php

namespace App\View\Components\moderator;

use Illuminate\View\Component;

class posts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $posts;
    public function __construct($posts)
    {
        $this->posts= $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.moderator.posts');
    }
}
