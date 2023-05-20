<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardComponent extends Component
{
    public $placeName , $description, $name, $price ,$image, $id ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($placeName = '',$description='',$name ='',$price = '' ,$image = '' ,$id = '')
    {
        $this->placeName = $placeName ;
        $this->description = $description ;
        $this->name = $name ;
        $this->price = $price ;
        $this->image = $image ;
        $this->id = $id ;

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
