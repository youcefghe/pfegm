<?php

namespace App\View\Components;

use Illuminate\View\Component;

class test extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post_id;
    public $user_id;
    public function __construct($post_id,$user_id)
    {
        $this->post_id = $post_id;
        $this->user_id = $user_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.test');
    }
}
