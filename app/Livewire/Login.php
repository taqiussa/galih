<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;

#[Title('Login')]
#[Layout('layouts.guest')]
class Login extends Component
{
    public string $username = '';
    public string $password = '';

    protected array $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    protected array $messages = [
        'username.required' => 'The username field is required.',
        'password.required' => 'The password field is required.',
    ];

    public function mount(): void {}

    public function render()
    {
        return view('livewire.login');
    }

    public function login(): void
    {
        $this->validate();

        // Dapatkan guard hasil autentikasi
        $guard = $this->authenticate();

        Session::regenerate();

        // redirect berdasarkan guard
        $route = $guard === 'siswa'
            ? 'siswa.dashboard'
            : 'dashboard';

        $this->redirectIntended(default: route($route, absolute: false), navigate: true);
    }

    public function authenticate(): string
    {
        $this->ensureIsNotRateLimited();

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        // Tentukan apakah ini login PSB atau login guru (web)
        $isSiswa = preg_match('/^(A0|B0|C0|D0)\d+$/i', $this->username);

        $guard = $isSiswa ? 'siswa' : 'web';

        if (! Auth::guard($guard)->attempt($credentials)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'username' => 'Username dan password tidak cocok dengan catatan kami.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        return $guard; // ✅ harus mengembalikan guard
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->username) . '|' . request()->ip());
    }
}
