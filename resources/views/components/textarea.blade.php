<div @class($groupClass === null ? 'form-group' : $groupClass)>
    @isset($label)
        <x-label for="{{ $getId() }}">{{ $label }}</x-label>
    @endisset

    <textarea
        name="{{ $name }}"
        @if (isset($id) || isset($label))
            id="{{ $getId() }}"
        @endif
        {{ $attributes->class(['textarea', 'has-error' => isset($name, $errors) && $errors->has($name)]) }}
    >{{ $value }}</textarea>

    @if ($hasErrorAndShouldShow())
        <x-input-error>{{ $errors->first($getDotName()) }}</x-input-error>
    @endif
</div>
