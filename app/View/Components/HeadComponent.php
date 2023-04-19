<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeadComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $css;
    public function __construct($css='')
    {
        $this->css=$css;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.head-component');
    }
}
