<?php

namespace App\View\Components\Landing;

use App\Models\Carousel;
use Illuminate\View\Component;

class Hero extends Component
{
    public $carousels;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->carousels = Carousel::activeCarousels();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.landing.hero');
    }
}
