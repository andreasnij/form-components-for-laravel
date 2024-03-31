<div class="form-group">
    @isset($label)
        <x-label for="{{ $getId() }}">{{ $label }}</x-label>
    @endisset

    <input
        {{ $attributes->class('input')->merge(['type' => 'text']) }}
        @isset($name))
            name="{{ $name }}"
        @endisset
        @if (isset($id) || isset($label))
            id="{{ $getId() }}"
        @endif
        @isset($value))
            value="{{ $value }}"
        @endisset
    />

    @if (isset($name) && $errors->has($name))
        <x-input-error>{{ $errors->first($name) }}</x-input-error>
    @endif
</div>
