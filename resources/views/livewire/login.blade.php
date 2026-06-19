<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div
            class="absolute inset-0 bg-gradient-to-l from-blue-700 to-blue-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
        </div>
        <form wire:submit='login' class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="h-12 sm:h-14">
                <h1 class="text-2xl font-semibold">PSB Miftahul Huda Peron</h1>
            </div>
            <div class="max-w-md mx-auto">
                <div class="space-y-4 pt-10">
                    <x-input wire:model="username" label="Username" placeholder="Masukkan Username" icon="user" />
                    <x-password wire:model="password" label="Password" placeholder="Masukkan Password"
                        icon="lock-closed" />

                    <x-button type="submit" label="Login" black class="w-full" spinner="login" />
                    <x-button href="{{ route('/') }}" label="Batal" red class="w-full" wire:navigate />
                </div>
            </div>
        </form>
    </div>
</div>
