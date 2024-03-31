<?php

namespace FormComponentsForLaravel\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputError extends Component
{
    public function render(): View
    {
        return view('form-components::components.input-error');
    }
}
