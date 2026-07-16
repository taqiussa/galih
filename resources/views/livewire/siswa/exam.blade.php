<div class="min-h-screen bg-gray-50 py-8">

    <div class="max-w-7xl mx-auto px-4">

        @switch($status)

            {{-- PETUNJUK --}}
            @case('petunjuk')
                <x-card class="max-w-2xl mx-auto text-center">
                    <h1 class="text-3xl font-bold text-slate-700 mb-6">
                        Selamat Datang di Tes Masuk SMP Miftahul Huda
                    </h1>
                    <div class="text-left space-y-3 text-slate-600">
                        <p class="font-semibold">Petunjuk:</p>
                        <ol class="list-decimal ml-6 space-y-2">
                            <li>Anda akan mengerjakan <strong>1 sesi tes</strong></li>
                            <li>Sesi 1: Tes Pengetahuan Umum (Akademik)</li>
                            <li>Jawaban <strong>tersimpan otomatis</strong></li>
                            <li>Pastikan semua soal dijawab sebelum menekan tombol Submit</li>
                        </ol>
                    </div>
                    <div class="mt-10">
                        <x-button wire:click="mulaiTest" wire:loading.attr='disabled' spinner="mulaiTest" slate
                            label="Mulai Tes Sekarang" class="px-12" />
                    </div>
                </x-card>
            @break

            {{-- AKADEMIK --}}
            @case('akademik')
                <div class=" bg-white border-2 rounded-lg shadow-lg p-7 mbx mb-3">
                    <p class="text-justify text-slate-600">
                        Seleksi Akademik SMP Miftahul Huda Peron Tahun Ajaran 2026 / 2027
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div class="lg:col-span-3 order-2 lg:order-1">
                        <x-card class="p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-bold">Soal {{ $priority }} / {{ $totalQuestions }}</h2>
                            </div>

                            <p class="text-lg leading-relaxed mb-8">{!! nl2br(e($currentQuestion?->soal)) !!}</p>

                            <div class="space-y-4">
                                @foreach (json_decode($currentQuestion?->pilihan ?? '[]', true) as $index => $option)
                                    <div wire:click="choiceOption({{ $index }})"
                                        class="p-4 rounded-lg border-2 cursor-pointer transition-all
                                            {{ $selectedAnswer === $index ? 'border-indigo-600 bg-indigo-50' : 'border-gray-300 hover:border-indigo-400' }}">
                                        <div class="flex items-center">
                                            <span class="font-bold text-indigo-700 mr-3">{{ chr(65 + $index) }}.</span>
                                            <span class="text-gray-800">{{ $option }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex flex-wrap gap-3 mt-10">
                                <x-button wire:click="prev" spinner="prev" wire:loading.attr='disabled' secondary
                                    :disabled="$priority <= 1">Sebelumnya</x-button>
                                <x-button wire:click="next" spinner="next" wire:loading.attr='disabled' secondary
                                    :disabled="$priority >= $totalQuestions">Selanjutnya</x-button>
                                <div class="flex-1"></div>
                                @if ($priority === $totalQuestions)
                                    <x-button wire:click="simpan" positive label="Simpan" class="font-semibold" spinner="simpan"
                                        wire:loading.attr='disabled' />
                                @endif
                            </div>
                        </x-card>
                    </div>

                    <div class="order-1 lg:order-2">
                        @include('livewire.partial.exam-sidebar', [
                            'items' => $questions,
                            'type' => 'akademik',
                            'current' => $priority,
                            'answered' => $answeredQuestions,
                        ])
                    </div>
                </div>
            @break

            {{-- SELESAI --}}
            @case('akhir')
                <x-card class="max-w-2xl mx-auto text-center">
                    <h1 class="text-4xl font-bold text-green-600 mb-6">Selamat!</h1>
                    <p class="text-xl text-gray-700 mb-8">
                        Anda telah menyelesaikan seluruh tes masuk SMP Miftahul Huda.
                    </p>
                    <div class="card bg-primary text-primary-content shadow">

                        <div class="card-body p-5 text-center">

                            <h3 class="font-semibold text-lg">
                                Hasil Nilai
                            </h3>

                            <div class="text-6xl font-extrabold leading-none mt-2">
                                {{ $this->hasil?->akademik?->nilai ?? '-' }}
                            </div>

                            <div class="divider my-3"></div>

                            <div class="grid grid-cols-2 gap-3 text-sm">

                                <div class="rounded-lg bg-white/10 p-2">
                                    <div class="opacity-80">Benar</div>
                                    <div class="font-bold text-lg">
                                        {{ $this->hasil?->akademik?->benar ?? 0 }}
                                    </div>
                                </div>

                                <div class="rounded-lg bg-white/10 p-2">
                                    <div class="opacity-80">Salah</div>
                                    <div class="font-bold text-lg">
                                        {{ $this->hasil?->akademik?->salah ?? 0 }}
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <x-button href="{{ route('siswa.logout') }}" wire:navigate positive label="Logout & Kembali ke Beranda"
                        class="px-12" />
                </x-card>
            @break

        @endswitch
    </div>
</div>
