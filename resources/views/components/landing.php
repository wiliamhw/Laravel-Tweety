<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Landing extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    public $margin_top;

    /**
     * Create the component instance.
     *
     * @param  string  $margin_top
     * @return void
     */
    public function __construct($margin_top)
    {
        $this->margin_top = $margin_top;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.landing');
    }
}
