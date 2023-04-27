<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardComponent extends Component
{
    public $placeName , $description, $name, $price ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($placeName = '',$description='',$name ='',$price = '')
    {
        $this->placeName = $placeName ;
        $this->description = $description ;
        $this->name = $name ;
        $this->price = $price ;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-component');
    }
}
