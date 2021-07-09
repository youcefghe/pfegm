<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class ruels extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $information;
    public function __construct($information)
    {
        $this->information= $information;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community.ruels');
    }
}
