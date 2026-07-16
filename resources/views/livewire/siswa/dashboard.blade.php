 <div class="overflow-hidden bg-white border-2 rounded-lg shadow-lg ">
     <div class="p-6 text-gray-900">
         <p class="text-justify text-slate-600">
             Selamat anda berhasil melakukan pendaftaran! <br>
             <br>
             Nomor Pendaftaran anda :
             <span class="text-lg font-bold">
                 {{ auth()->user()->kode_daftar }}
             </span>
             <br>
             <br>
             Catat dan simpan nomor pendaftaran untuk konfirmasi dan tes seleksi di kampus SMP MIFTAHUL HUDA <br>
             Username untuk Tes Akademik {{ auth()->user()->kode_daftar }} <br>
             Password untuk Tes Akademik : 12345678
         </p>
     </div>
 </div>
