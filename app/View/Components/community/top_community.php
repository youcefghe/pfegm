<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class top_community extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $topFive;
    public function __construct($topFive)
    {
        $this->topFive = $topFive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community.top_community');
    }
}
