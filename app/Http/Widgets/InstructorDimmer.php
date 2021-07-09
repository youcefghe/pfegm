<?php

namespace App\Http\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class InstructorDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Models\Instructor::count();
        $string = 'Instructors';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-puzzle',
            'title'  => "{$count} {$string}",
            'text'   => 'You have '.$count.' Instructors in your database. Click on button below to view all Instructors.',
            'button' => [
                'text' => ' View all users with instructors',
                'link' => route('voyager.users.index'),
            ],
            'image' => '/images/dash/grow-section.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
