<div @class($groupClass === null ? 'form-group' : $groupClass)>
    @isset($label)
        <x-label for="{{ $getId() }}">{{ $label }}</x-label>
    @endisset

    <input
        @isset($name))
            name="{{ $name }}"
        @endisset
        @if (isset($id) || isset($label))
            id="{{ $getId() }}"
        @endif
        @isset($value))
            value="{{ $value }}"
        @endisset
        {{ $attributes->class(['input', 'has-error' => isset($name, $errors) && $errors->has($name)])->merge(['type' => 'text']) }}
    />

    @if ($hasErrorAndShouldShow())
        <x-input-error>{{ $errors->first($getDotName()) }}</x-input-error>
    @endif
</div>
