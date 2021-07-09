<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class reply_message extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $fromId;
    public function __construct($fromId,$id)
    {
        $this->fromId = $fromId;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.reply_message');
    }
}
