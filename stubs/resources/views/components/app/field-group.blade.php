@props([
    'info' => null,
    'label' => null,
    'required' => false,
    'checkbox' => false
])

<div class="field-group {{ $checkbox ? '--checkbox' : '' }}">
    @if ($label)
    <label class="field-label {{ $checkbox ? 'order-2' : '' }}">
        {{ $label }}
        @if ($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif

    {{ $slot }}

    @if ($info)
    <div class="field-info">{{ $info }}</div>
    @endif
</div>
