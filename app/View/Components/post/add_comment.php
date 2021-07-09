<?php

namespace App\View\Components\post;

use Illuminate\View\Component;

class add_comment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $postId;
    public $user_id;
    public function __construct($postId,$userId)
    {
        $this->postId = $postId;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post.add_comment');
    }
}
