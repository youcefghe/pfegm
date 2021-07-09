<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class edit_cover extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $community;
    public function __construct($community)
    {
        $this->community = $community;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.edit_cover');
    }
}
