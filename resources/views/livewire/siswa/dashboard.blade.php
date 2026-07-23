<div class="overflow-hidden bg-white border-2 rounded-lg shadow-lg">
    <div class="p-6 text-gray-900">

        <p class="text-justify text-slate-600">
            Selamat anda berhasil melakukan pendaftaran!
            <br><br>

            Nomor Pendaftaran Anda :
            <span class="text-lg font-bold">
                {{ auth()->user()->kode_daftar }}
            </span>

            <br><br>

            Catat dan simpan nomor pendaftaran untuk konfirmasi dan tes seleksi di kampus SMP MIFTAHUL HUDA.

            <br><br>

            Username :
            <strong>{{ auth()->user()->kode_daftar }}</strong>

            <br>

            Password :
            <strong>12345678</strong>

            <br>
            Catat Username dan Password untuk login ke akun anda.
        </p>

        <div class="mt-8 flex justify-end">
            <x-button label="Tutup" icon="check" red wire:click="selesai" />
        </div>

    </div>
</div>
