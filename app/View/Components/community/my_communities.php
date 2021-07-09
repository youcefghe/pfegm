<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class my_communities extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $mycommunities;
    public function __construct($mycommunities)
    {
        $this->$mycommunities = $mycommunities;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community.my_communities');
    }
}
