<div class="form-group">
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

    @if (isset($name, $errors) && $errors->has($name))
        <x-input-error>{{ $errors->first($name) }}</x-input-error>
    @endif
</div>
