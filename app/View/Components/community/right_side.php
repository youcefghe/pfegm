<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class right_side extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $community;
    public $creation_date;
    public $creator;
    public $members;
    public $moderators;
    public $joined;
    public function __construct($joined,$community,$moderators,$creation_date,$creator,$members)
    {
        $this->community = $community;
        $this->creator = $creator;
        $this->creation_date = $creation_date;
        $this->members = $members;
        $this->moderators=$moderators;
        $this->joined =$joined;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community.right_side');
    }
}
