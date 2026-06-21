@props([
    'selected' => false,
    'label' => '',
    'click' => null,
])

<div class="flex items-center space-x-3">
    <x-icon name="{{ $selected ? 'check-circle' : 'stop' }}"
        class="w-6 h-6 {{ $selected ? 'text-white fill-emerald-500' : '' }} hover:cursor-pointer"
        wire:click="{{ $click }}" />
    <span class="hover:cursor-pointer" wire:click="{{ $click }}">
        {{ $label }}
    </span>
</div>
