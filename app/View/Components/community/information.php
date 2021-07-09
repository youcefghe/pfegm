<?php

namespace App\View\Components\community;

use Illuminate\View\Component;

class information extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $information;
    public $joined;
    public $creator;
    public $members;
    public function __construct($information, $creator,$joined,$members)
    {
        $this->information = $information;
        $this->creator = $creator;
        $this->joined =$joined;
        $this->members = $members;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.community.information');
    }
}
