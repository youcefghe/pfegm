<?php

namespace App\View\Components\moderator;

use Illuminate\View\Component;

class post_preview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.moderator.post_preview');
    }
}
