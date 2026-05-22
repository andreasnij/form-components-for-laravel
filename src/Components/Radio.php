<?php

namespace FormComponentsForLaravel\Components;

use BackedEnum;
use Illuminate\Contracts\View\View;

class Radio extends AbstractInputComponent
{
    public bool $checked = false;

    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        public ?string $value = null,
        public ?string $id = null,
        bool $checked = false,
        public ?string $labelClass = null,
        public bool $showError = true,
        public string|false|null $groupClass = null,
    ) {
        $this->setChecked($checked);
    }

    public function render(): View
    {
        return view('form-components::components.radio');
    }

    protected function setChecked(bool $checked): void
    {
        if (!$this->name || $this->value === null) {
            return;
        }

        if (
            !$checked
            && Form::$model && empty(old())
            && ($modelValue = data_get(Form::$model, $this->name)) !== null
        ) {
            $checked = $this->matchesValue($modelValue);
        }

        if (($oldValue = old($this->name)) !== null) {
            $this->checked = $this->matchesValue($oldValue);
        } else {
            $this->checked = $checked;
        }
    }

    private function matchesValue(mixed $value): bool
    {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        return is_scalar($value) && (string) $this->value === (string) $value;
    }
}
