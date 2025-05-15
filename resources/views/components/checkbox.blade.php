<div @class($groupClass === null ? 'checkbox-group' : $groupClass)>
    <div class="checkbox-container">
        <input
            type="checkbox"
            @isset($name)
                name="{{ $name }}"
            @endisset
            @if (isset($id) || isset($label) || isset($slot))
                id="{{ $getId() }}"
            @endif
            @isset($value)
                value="{{ $value }}"
            @endisset
            @if ($checked)
                checked
            @endif
            {{ $attributes->class(['checkbox', 'has-error' => isset($name, $errors) && $errors->has($name)]) }}
        />
        @if (isset($label))
            <x-label for="{{ $getId() }}" class="{{ $labelClass }}">{{ $label }}</x-label>
        @elseif (isset($slot))
            <x-label for="{{ $getId() }}" class="{{ $labelClass }}">{{ $slot }}</x-label>
        @endif
    </div>

    @if ($hasErrorAndShouldShow())
        <x-input-error>{{ $errors->first($getDotName()) }}</x-input-error>
    @endif
</div>