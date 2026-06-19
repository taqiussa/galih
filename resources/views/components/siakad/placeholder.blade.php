<div id="loader" class="fixed inset-0 flex items-center justify-center pointer-events-none z-50">
    <!-- overlay transparan: bg-black/0 artinya 0% opacity -->
    <div class="absolute inset-0 bg-black/0"></div>

    <!-- Spinner -->
    <div role="status" aria-label="Loading" class="relative z-10">
        <div class="size-24 rounded-full border-8 border-transparent animate-spin">
            <div class="absolute inset-0 rounded-full animate-spin"
                style="
                background: conic-gradient(
                    from 0deg,
                    transparent 0deg,
                    transparent 100deg,
                    #9ea2ac 360deg
                );
                -webkit-mask: radial-gradient(farthest-side, transparent calc(100% - 8px), black calc(100% - 8px));
                        mask: radial-gradient(farthest-side, transparent calc(100% - 8px), black calc(100% - 8px));
                animation-duration: 2000ms;
            ">
            </div>
            <!-- optional center dot -->
            <span class="sr-only">Memuat…</span>
        </div>
    </div>
</div>
