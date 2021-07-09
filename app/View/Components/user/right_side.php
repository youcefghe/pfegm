<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class right_side extends Component
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
        return view('components.user.right_side');
    }
}
