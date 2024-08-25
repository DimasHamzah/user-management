<?php

namespace App\View\Components\item;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textheader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..item.text-header');
    }
}
