<?php

namespace FormComponentsForLaravel\Components;

use Illuminate\Contracts\View\View;

class Checkbox extends AbstractInputComponent
{
    public bool $checked;

    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        public ?string $value = null,
        public ?string $id = null,
        bool $checked = false,
        public ?string $labelClass = null,
    ) {
        $this->setChecked($checked);
    }

    public function render(): View
    {
        return view('form-components::components.checkbox');
    }

    protected function setChecked(bool $checked): void
    {
        if (!$this->name) {
            return;
        }

        if (
            !$checked
            && Form::$model && empty(old())
            && ($modelChecked = data_get(Form::$model, $this->name))
        ) {
            $checked = (bool) $modelChecked;
        }

        $this->checked = (bool) old($this->name, $checked);
    }
}
