<div class="form-group">
    @isset($label)
        <x-label for="{{ $getId() }}">{{ $label }}</x-label>
    @endisset

    <textarea
        {{ $attributes->class('textarea') }}
        name="{{ $name }}"
        @if (isset($id) || isset($label))
            id="{{ $getId() }}"
        @endif

    >{{ $value }}</textarea>

    @if (isset($name) && $errors->has($name))
        <x-input-error>{{ $errors->first($name) }}</x-input-error>
    @endif
</div>
