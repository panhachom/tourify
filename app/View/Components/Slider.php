<?php

namespace App\View\Components;

use App\Models\Promotion;
use Illuminate\View\Component;

class Slider extends Component
{
    public $promotions;

    /**
     * Create a new component instance.
     *
     * @param  Promotion  $promotion
     * @return void
     */
    public function __construct(Promotion $promotions)
    {
        $this->promotions = $promotions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider');
    }
}
