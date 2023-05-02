<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TourButtonLink extends Component
{
    public $icon, $tourType, $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon = '',$tourType = '',$color = '')
    {
        $this->icon = $icon;
        $this->tourType = $tourType;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tour-button-link');
    }
}
