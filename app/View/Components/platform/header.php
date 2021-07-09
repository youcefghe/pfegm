<?php

namespace App\View\Components\platform;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $course;
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.platform.header');
    }
}
