<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class communty_section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $allposts;
    public $community;
    public $moderators;
    public $members;
    public  $joined;
    public $creator;
    public function __construct($allposts,$community,$members,$joined,$creator,$moderators)
    {
        $this->allposts =$allposts;
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
        return view('components.community.communty_section');
    }
}
