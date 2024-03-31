<?php

namespace FormComponentsForLaravel\Components;

use Illuminate\Contracts\View\View;

class Input extends AbstractInputComponent
{
    public function render(): View
    {
        return view('form-components::components.input');
    }
}
