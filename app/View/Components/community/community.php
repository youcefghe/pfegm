<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class community extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $communities;
    public function __construct($communities)
    {
        $this->communities = $communities;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */

    public function render()
    {
        return view('components.community.community');
    }
}
