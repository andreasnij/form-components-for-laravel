<div class="checkbox-group">
    <div class="checkbox-container">
        <input
            type="checkbox"
            @isset($name)
                name="{{ $name }}"
            @endisset
            @if (isset($id) || isset($label))
                id="{{ $getId() }}"
            @endif
            @isset($value))
                value="{{ $value }}"
            @endisset
            @if ($checked)
                checked
            @endif
            {{ $attributes->class('checkbox') }}
        />
         @isset($label)
            <x-label for="{{ $getId() }}" class="{{ $labelClass }}">{{ $label }}</x-label>
        @endisset
    </div>

    @if (isset($name) && $errors->has($name))
        <x-input-error>{{ $errors->first($name) }}</x-input-error>
    @endif
</div>