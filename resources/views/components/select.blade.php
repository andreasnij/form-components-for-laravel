<div @class($groupClass === null ? 'form-group' : $groupClass)>
    @isset($label)
        <x-label for="{{ $getId() }}">{{ $label }}</x-label>
    @endisset

    <select
        name="{{ $name }}"
        @if (isset($id) || isset($label))
            id="{{ $getId() }}"
        @endif
        {{ $attributes->class(['select', 'has-error' => isset($name, $errors) && $errors->has($name)]) }}
    >

        @if ($placeholder)
            <option value="" disabled @if($value === null) selected @endif>
                {{ $placeholder }}
            </option>
        @endif

        @forelse($options as $key => $option)
            @if (is_array($option))
                <optgroup label="{{ $key }}">
                    @foreach($option as $subKey => $subOption)
                        <option value="{{ $subKey }}" @if($isSelected($subKey)) selected @endif>
                            {{ $subOption }}
                        </option>
                    @endforeach
                </optgroup>
            @else
                <option value="{{ $key }}" @if($isSelected($key)) selected @endif>
                    {{ $option }}
                </option>
            @endif
        @empty
            {{ $slot }}
        @endforelse

    </select>

    @if ($hasErrorAndShouldShow())
        <x-input-error>{{ $errors->first($getDotName()) }}</x-input-error>
    @endif
</div>
