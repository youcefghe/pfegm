<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class add_reply extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comment;
    public function __construct($comment)
    {
        $this->comment= $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post.add_reply');
    }
}
