<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Akademik;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Siswa;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\Computed;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Exam extends Component
{
    use WireUiActions;

    public string $status = 'petunjuk';   // petunjuk | akademik | gaya | akhir

    // Akademik
    public int $priority = 1;
    public ?int $selectedAnswer = null;

    public function mount(): void
    {
        $user = Auth::user();

        if ($user->sudah_tes) {
            $this->status = 'akhir';
        } else {
            $this->status = 'petunjuk';
            $this->priority = $this->firstUnansweredQuestionPriority();
        }

        $this->loadCurrentSelections();
    }

    private function loadCurrentSelections(): void
    {
        $kode = Auth::user()->kode_daftar;

        if ($this->status === 'petunjuk') {
            $this->selectedAnswer = Jawaban::where('kode_daftar', $kode)
                ->where('nomor', $this->priority)
                ->value('jawaban');
        }
    }

    private function firstUnansweredQuestionPriority(): int
    {
        $answered = $this->answeredQuestions->keys()->toArray();
        for ($i = 1; $i <= ($this->questions->count() ?: 50); $i++) {
            if (!in_array($i, $answered, true)) {
                return $i;
            }
        }
        return 1;
    }

    #[Computed]
    public function questions()
    {
        return Pertanyaan::orderBy('nomor')->get();
    }

    #[Computed]
    public function currentQuestion()
    {
        return $this->questions->firstWhere('nomor', $this->priority);
    }

    #[Computed]
    public function answeredQuestions()
    {
        return Jawaban::where('kode_daftar', Auth::user()->kode_daftar)
            ->pluck('nomor')
            ->flip(); // priority => true
    }

    // ────────────────────────────── NAVIGASI ──────────────────────────────
    public function setPriority(int $p): void
    {
        $this->priority = max(1, min($this->questions->count(), $p));
        $this->loadCurrentSelections();
    }

    public function prev(): void
    {
        if ($this->priority > 1) $this->setPriority($this->priority - 1);
    }
    public function next(): void
    {
        if ($this->priority < $this->questions->count()) $this->setPriority($this->priority + 1);
    }

    // ────────────────────────────── JAWABAN ──────────────────────────────
    public function choiceOption(int $index): void
    {
        $this->selectedAnswer = $index;

        Jawaban::updateOrCreate(
            ['kode_daftar' => Auth::user()->kode_daftar, 'nomor' => $this->priority],
            [
                'jawaban'     => $index,
                'nilai_benar' => $index == $this->currentQuestion?->kunci ? 1 : 0,
            ]
        );

        $this->dispatch('answer-saved');
    }

    // ────────────────────────────── SUBMIT ──────────────────────────────
    public function simpan(): void
    {
        if ($this->answeredQuestions->count() < $this->questions->count()) {
            $this->dialog()->error(
                title: 'Belum Selesai!',
                description: 'Masih ada soal akademik yang belum dijawab.'
            );
            return;
        }

        // Di method simpan()
        $benar = Jawaban::where('kode_daftar', Auth::getUser()->kode_daftar)->sum('nilai_benar');
        $nilai = $benar * 5; // atau tetap *5 kalau memang pakai bobot 5

        Akademik::updateOrCreate(
            ['kode_daftar' => Auth::getUser()->kode_daftar],
            [
                'benar' => $benar,
                'salah' => 20 - $benar,
                'nilai' => $nilai,
            ]
        );

        Auth::user()->update(['sudah_tes' => true]);
        $this->status = 'akhir';
        $this->loadCurrentSelections();
    }

    public function mulaiTest(): void
    {
        $this->status = 'akademik';
        $this->priority = $this->firstUnansweredQuestionPriority();
        $this->loadCurrentSelections();
    }

    public function render(): View
    {
        return view('livewire.siswa.exam', [
            'questions'         => $this->questions,
            'currentQuestion'   => $this->currentQuestion,
            'answeredQuestions' => $this->answeredQuestions,
            'totalQuestions'    => $this->questions->count(),
        ]);
    }

    #[Computed()]
    public function hasil()
    {
        return Siswa::query()
            ->whereNis(Auth::getUser()->nis)
            ->with([
                'akademik',
            ])
            ->first();
    }
}
