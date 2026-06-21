<div class="bg-white rounded-lg shadow-lg p-5 border-2 border-slate-700">
    <h3 class="font-bold text-lg mb-4 text-center">
        Daftar Soal Akademik
    </h3>

    <div class="grid grid-cols-5 gap-3 mb-6">
        @foreach ($items as $item)
            @php
                $isAnswered = $answered->has($item->nomor);
                $isCurrent = $item->nomor === $current;
            @endphp

            <div wire:click="{{ match ($type) {
                'akademik' => 'setPriority',
                default => 'setPriority',
            } }}({{ $item->nomor }})"
                class=" size-9 flex items-center justify-center gap-3 rounded-md text-sm font-bold transition-all cursor-pointer
                    @if ($isCurrent) ring-4 ring-indigo-500 ring-offset-2 @endif
                    @if ($isAnswered) bg-emerald-500 text-white
                    @else bg-gray-200 text-gray-700 hover:bg-gray-300 @endif
                    border-2 border-gray-400"
                title="Soal {{ $item->nomor }} {{ $isAnswered ? '(Sudah dijawab)' : '' }}">
                {{ $item->nomor }}
            </div>
        @endforeach
    </div>
</div>
