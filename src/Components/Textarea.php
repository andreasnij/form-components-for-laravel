<?php

namespace FormComponentsForLaravel\Components;

use Illuminate\Contracts\View\View;

class Textarea extends AbstractInputComponent
{
    public function render(): View
    {
        return view('form-components::components.textarea');
    }
}
