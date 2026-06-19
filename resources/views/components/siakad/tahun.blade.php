<div class="flex flex-col capitalize text-md text-slate-600">
    <div>tahun</div>
    <select {{ $attributes }}
        class="border rounded-md border-slate-200 focus:border-purple-600   disabled:bg-gray-50 disabled:shadow-gray-100">
        <option value="">Pilih Tahun</option>
        @for ($i = 2023; $i < date('Y'); $i++)
            <option value="{{ $i + 2 . ' / ' . ($i + 3) }}">{{ $i + 2 . ' / ' . ($i + 3) }}</option>
        @endfor
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
