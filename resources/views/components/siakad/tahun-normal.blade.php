@props(['label' => 'tahun'])
<div class="flex flex-col space-y-1 capitalize text-slate-600 text-md">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md border-slate-200 focus:border-purple-600
        disabled:bg-gray-50 disabled:shadow-gray-100">
        <option value="">Pilih Tahun</option>
        @for ($i = 2022; $i < date('Y + 1'); $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
