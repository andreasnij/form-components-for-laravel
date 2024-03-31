<form method="{{ $spoofMethod ? 'POST' : $method }}" {{ $attributes }}>
    @if ($spoofMethod)
        @method($method)
    @endif
    @if ($method !== 'GET')
        @csrf
    @endif

    {{ $slot }}
</form>