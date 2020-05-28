@props([
    'options' => null,
    'type' => 'text'
])

<div class="field --{{ $type }}">
    @if ($iconLeft ?? null)
    <div class="field-icon --left">{{ $iconLeft }}</div>
    @endif
    @if ($iconRight ?? null)
    <div class="field-icon --right">{{ $iconRight }}</div>
    @endif
    @if ($type === 'select')
    <div class="field-icon right-0 mr-3">
        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
    @endif

    @if ($type === 'textarea')
    <textarea {{ $attributes->merge(['class' => 'field-input']) }}>{{ $value ?? null }}</textarea>
    @elseif ($type === 'select')
    <select {{ $attributes->merge(['class' => 'field-input']) }}>
        {{ $options }}
    </select>
    @elseif (in_array($type, ['checkbox', 'radio']))
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'field-checkbox']) }}>
    @else
    <input type="{{ $type }}" {{ $attributes->merge(['class' => 'field-input']) }}>
    @endif
</div>
