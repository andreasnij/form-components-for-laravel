<div class="form-group">
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

    @if (isset($name, $errors) && $errors->has($name))
        <x-input-error>{{ $errors->first($name) }}</x-input-error>
    @endif
</div>
