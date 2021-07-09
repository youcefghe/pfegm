<?php

namespace App\View\Components\tags;

use Illuminate\View\Component;

class toastMessage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $message;
    public function __construct($message)
    {
        $this->message =$message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.tags.toast-message');
    }
}
