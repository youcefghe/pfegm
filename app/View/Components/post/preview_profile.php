<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class preview_profile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $community;
    public $post;
    public function __construct($post,$community)
    {
        $this->post =$post;
        $this->community = $community;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post.preview_profile');
    }
}
