<?php

namespace FormComponentsForLaravel\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public static object|array|null $model = null;

    public string $method;
    public bool $spoofMethod;

    public function __construct(string $method = 'POST', object|array|null $model = null)
    {
        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE'], true);
        self::$model = $model;
    }

    public function render(): View
    {
        return view('form-components::components.form');
    }
}
