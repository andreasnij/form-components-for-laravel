<?php

namespace FormComponentsForLaravel\Components;

use Illuminate\Contracts\View\View;

class Select extends AbstractInputComponent
{
    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        ?string $value = null,
        public ?string $id = null,
        public array $options = [],
        public ?string $placeholder = null,
        public bool $showError = true,
        public string|false|null $groupClass = null,
    ) {
        $this->setValue($value);
    }

    public function render(): View
    {
        return view('form-components::components.select');
    }

    public function isSelected(string|int $key): bool
    {
        return $this->value == $key;
    }
}
