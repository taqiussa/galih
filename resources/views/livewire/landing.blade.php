<div>
    <!-- Header & Navigation -->
    <header class="bg-gradient-to-r from-blue-700 to-blue-400 text-white shadow-lg sticky top-0 z-10"
        x-data="{ mobileMenu: false }">
        <div class="container mx-auto px-4 py-5 flex justify-between items-center">
            <div class="flex gap-2 items-center">
                <img loading="lazy" decoding="async" src="{{ asset('images/logo.png') }}" alt="logo"
                    class="h-12 sm:h-14">
                <h1 class="text-2xl md:text-3xl font-bold text-white">SMP Miftahul Huda</h1>
            </div>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-5 text-lg md:items-center">
                <a href="#" class="hover:text-indigo-300 transition">Beranda</a>
                <a href="{{ route('daftar') }}" wire:navigate class="hover:text-indigo-300 transition">Pendaftaran</a>
                <a href="{{ route('login') }}" wire:navigate
                    class=" bg-white  text-blue-700 hover:text-indigo-300 font-bold px-2 py-1 rounded-md shadow-lg transform hover:scale-105 transition">
                    Masuk
                </a>
            </nav>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"
                        x-show="!mobileMenu" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"
                        x-show="mobileMenu" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu dengan Slide Down Smooth -->
        <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-500 transform"
            x-transition:enter-start="opacity-0 -translate-y-full" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 -translate-y-full" class="md:hidden bg-blue-400">
            <nav class="px-6 py-5 space-y-4 text-lg">
                <a href="#" class="block text-white hover:text-indigo-300 transition"
                    @click="mobileMenu = !mobileMenu">Beranda</a>
                <a href="{{ route('daftar') }}" wire:navigate
                    class="block text-white hover:text-indigo-300 transition">Pendaftaran</a>
                <a href="{{ route('login') }}" class="block text-white hover:text-indigo-300 transition">Masuk</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class=" bg-transparent text-white">
        <div class="absolute w-full bg-gradient-to-l from-blue-700 to-blue-400 md:max-h-72 h-96 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-400 opacity-30"></div>
        </div>
        <div class="container mx-auto px-6 text-center py-7">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-6">Pendaftaran Santri Baru</h2>
            <p class="text-xl md:text-2xl mb-10 md:mb-5 max-w-3xl mx-auto">
                Pendaftaran Santri Baru SMP Miftahul Huda Peron
            </p>
        </div>
    </section>

    <section id="jadwal" class="py-20 bg-white flex justify-center items-center flex-col ">
        <h2 class="text-4xl font-bold text-center text-blue-400 mb-12">Brosur Pendaftaran</h2>
        <img loading="lazy" decoding="async" src="{{ asset('images/jadwal.jpg') }}" alt="Jadwal Pendaftaran"
            class="md:w-1/2  w-full px-2 object-cover">
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gradient-to-l from-blue-700 to-blue-400 text-white py-10">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-2xl font-bold text-white mb-4">SMP Mifda</h3>
            <p class="mb-2">Jl. Masjid No. 2 Peron - Limbangan - Kendal</p>
            <p class="mb-4">WA: 08228000000 | Email: smpmifda@gmail.com</p>
            <p>&copy; {{ date('Y') }} SMP Mifda</p>
        </div>
    </footer>
</div>
