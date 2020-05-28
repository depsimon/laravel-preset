<form method="{{ $method !== 'GET' ? 'POST' : $method }}" action="{{ $action }}" {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!} {{ $attributes }}>
    @if ($method !== 'GET' && $method !== 'POST')
    @method($method)
    @endif
    @csrf
    {{ $slot }}
</form>