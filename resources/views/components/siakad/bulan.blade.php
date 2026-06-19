@props(['isGunabayar' => false])
<div class="flex flex-col capitalize text-md text-slate-600">
    <div>bulan</div>
    <select {{ $attributes }}
        class="border rounded-md border-slate-200 focus:border-purple-600
        disabled:bg-gray-50 disabled:shadow-gray-100">
        <option value="">Pilih Bulan</option>
        @if ($isGunabayar)
            <option value="01">Juli</option>
            <option value="02">Agustus</option>
            <option value="03">September</option>
            <option value="04">Oktober</option>
            <option value="05">November</option>
            <option value="06">Desember</option>
            <option value="07">Januari</option>
            <option value="08">Februari</option>
            <option value="09">Maret</option>
            <option value="10">April</option>
            <option value="11">Mei</option>
            <option value="12">Juni</option>
        @else
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
