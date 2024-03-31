<div class="form-group">
    @isset($label)
        <x-label for="{{ $getId() }}">{{ $label }}</x-label>
    @endisset

    <select
        {{ $attributes->class('select') }}
        name="{{ $name }}"
        @if (isset($id) || isset($label))
            id="{{ $getId() }}"
        @endif
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

    @if (isset($name) && $errors->has($name))
        <x-input-error>{{ $errors->first($name) }}</x-input-error>
    @endif
</div>
