<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExternalLogos extends Component
{
    public $src;
    public $alt;
    /**
     * Create a new component instance.
     */
    public function __construct($src, $alt = 'ExternalLogos')
    {
        $this->src = $src;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.external-logos');
    }
}
