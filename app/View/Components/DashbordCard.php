<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashbordCard extends Component
{

    public $xnumber , $xname, $xcolor, $xicon ;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $xnumber = '0' , $xname = '', $xcolor = '' , $xicon ='')
    {
        $this->xnumber = $xnumber ;
        $this->xname = $xname ;
        $this->xcolor = $xcolor ;
        $this->xicon = $xicon ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashbord-card');
    }
}
