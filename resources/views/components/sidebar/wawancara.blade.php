<div x-data="{
    openWawancara: {{ request()->routeIs('wawancara.*') ? 'true' : 'false' }}
}" class="mb-2">
    <!-- Header collapsible -->
    <div class="border-b-2 mb-2 py-2 cursor-pointer flex items-center justify-between"
        @click="openWawancara = !openWawancara">
        <span>Wawancara</span>

        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform transition"
            :class="openWawancara ? 'rotate-90' : ''" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M6 6L14 10L6 14V6Z" />
        </svg>
    </div>

    <!-- Content collapsible -->
    <div x-show="openWawancara" x-collapse>
        <x-sidebar.link route="wawancara.input-wawancara" label="input wawancara" wire:navigate />
        <x-sidebar.link route="wawancara.hasil-wawancara" label="hasil wawancara" wire:navigate />
    </div>
</div>
