<?php

namespace FormComponentsForLaravel\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    public function __construct(public string $for)
    {
    }

    public function render(): View
    {
        return view('form-components::components.label');
    }
}
