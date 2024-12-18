<div class="h-screen bg-blue-200 py-10 px-28 flex">
    <!-- Section Kiri: Selamat Datang -->
    <div class="w-1/2 text-white">
        <h1 class="text-6xl font-bold uppercase">tambah data <span class="text-sky-500">aktivitas</span></h1>
        <div class="relative">
        <img src="/images/activitie.png" alt="" class="absolute top-6 right-[calc(50%-30px)] translate-x-1/4 w-[350px]">
        </div>
    </div>

    <!-- Section Kanan: Form Tambah Pengguna -->
    <div class="bg-white w-1/2 rounded-[24px] ">
        <div class="form-container">
        <form action="/activities/store" method="POST" class="p-28 flex flex-col gap-4 h-full">
            <div class="flex flex-col">
            <label for="nama_aktivitas">Aktivitas</label>
                <input type="text" id="nama_aktivitas" name="nama_aktivitas" class="border-2 border-black rounded-xl p-1 " required>

            </div>
                <div class="flex flex-col">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" class="border-2 border-black rounded-xl p-1 " required>

                </div>
               <div class="flex flex-col">
               <label for="lokasi_aktivitas">Lokasi</label>
                <input type="text" id="lokasi_aktivitas" name="lokasi_aktivitas" class="border-2 border-black rounded-xl p-1 " required>

               </div>
               <div class="flex flex-col">
               <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga_aktivitas" class="border-2 border-black rounded-xl p-1 " required>

               </div>
               
                <button type="submit" class="mt-10 w-[200px] bg-blue-600 p-4 rounded-xl text-white mx-auto">Simpan</button>
            </form>
        </div>
    </div>
    </div>

