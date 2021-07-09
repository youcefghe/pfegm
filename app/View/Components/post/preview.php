<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class preview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;
    public $community;
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
        return view('components.post.preview');
    }
}
