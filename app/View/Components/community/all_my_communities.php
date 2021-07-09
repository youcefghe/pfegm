<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class all_my_communities extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comunities;
    public function __construct($communities)
    {
        $this->$communities =$communities;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community.all_my_communities');
    }
}
