<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class post_modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;
    public $community;
    public $moderators;
    public $members;
    public  $joined;
    public $creator;
    public function __construct($post,$community,$members,$joined,$creator,$moderators)
    {
        $this->post =$post;
        $this->community = $community;
        $this->moderators =$moderators;
        $this->joined= $joined;
        $this->creator =$creator;
        $this->members =$members;
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post.post_modal');
    }
}
