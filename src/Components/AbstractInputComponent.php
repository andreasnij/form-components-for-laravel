<?php

namespace FormComponentsForLaravel\Components;

use BackedEnum;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

abstract class AbstractInputComponent extends Component
{
    private static array $generatedIds = [];

    public ?string $value = null;

    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        ?string $value = null,
        public ?string $id = null,
        public bool $showError = true,
        public string|false|null $groupClass = null,
    ) {
        $this->setValue($value);
    }

    protected function setValue(?string $value): void
    {
        if (!$this->name) {
            return;
        }

        if (
            $value === null
            && Form::$model && empty(old())
            && ($modelValue = data_get(Form::$model, $this->name)) !== null
        ) {
            if ($modelValue instanceof BackedEnum) {
                $modelValue = $modelValue->value;
            }
            $value = (string) $modelValue;
        }

        $this->value = old($this->name, $value);
    }

    public function getId(): string
    {
        if (!$this->id) {
            $this->id = $this->generateId();
        }

        return $this->id;
    }

    protected function generateId(): string
    {
        do {
            $id = $this->name ? $this->name . '-' : '';
            $id .= Str::random(4);
        } while (in_array($id, self::$generatedIds, true));

        self::$generatedIds[] = $id;

        return $id;
    }

    public function hasErrorAndShouldShow(): bool
    {
        return $this->showError && $this->hasError();
    }

    public function hasError(): bool
    {
        if (!$this->name) {
            return false;
        }

        return $this->getErrorBag()->has($this->getDotName());
    }

    public function getDotName(): ?string
    {
        if (!$this->name) {
            return null;
        }

        return str_replace(['[', ']'], ['.', ''], Str::before($this->name, '[]'));
    }

    protected function getErrorBag(): MessageBag
    {
        $bags = View::shared('errors', fn() => session()->get('errors', new ViewErrorBag()));

        return $bags->getBag('default');
    }
}
