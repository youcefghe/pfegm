<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class contact extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $moderators;
    public $community;
    public function __construct($moderators,$community)
    {
        $this->moderators = $moderators;
        $this->community = $community;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community.contact');
    }
}
