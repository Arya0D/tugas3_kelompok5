<div class="h-screen bg-blue-200 py-10 px-28 flex">
    <!-- Section Kiri: Selamat Datang -->
    <div class="w-1/2 text-white">
        <h1 class="text-6xl font-bold uppercase">tambah data <span class="text-sky-500">aktivitas</span></h1>
        <div class="relative">
        <img src="/images/accommodations.png" alt="" class="absolute top-6 right-[calc(50%-30px)] translate-x-1/4 w-[350px]">
        </div>
    </div>

    <!-- Section Kanan: Form Tambah Pengguna -->
    <div class="bg-white w-1/2 rounded-[24px] ">
        <div class="form-container">
        <form action="/accommodations/store" method="POST" class="p-12 flex flex-col gap-4 h-fit">
            <div class="flex flex-col">
            <label for="nama_penginapan">Nama:</label>
                <input type="text" name="nama_penginapan" id="nama_penginapan" class="border-2 border-black rounded-xl p-1 " required>

            </div>
            <div class="flex flex-col" >
            <label for="lokasi_penginapan">Lokasi:</label>
            <input type="text" name="lokasi_penginapan" id="lokasi_penginapan" class="border-2 border-black rounded-xl p-1 " required>
            </div>
            <div  class="flex flex-col">
            <label for="fasilitas">Fasilitas:</label>
                <input type="text" name="fasilitas" id="fasilitas" class="border-2 border-black rounded-xl p-1 " required>
            </div>
            <div  class="flex flex-col">
            <label for="harga_penginapan">Harga:</label>
            <input type="number" name="harga_penginapan" id="harga_penginapan" class="border-2 border-black rounded-xl p-1 " required>
            </div>
            <div  class="flex flex-col">
            <label for="id_aktivitas">Aktivitas:</label>
                <select name="aktivitas" id="" class="border-2 border-black rounded-xl p-1 ">
                <option value="">Pilih Aktivitas</option>    
                <?php foreach ($activities as $x): ?>
                        <option value="<?= htmlspecialchars($x['id_aktivitas']) ?>">
                            <?= htmlspecialchars($x['nama_aktivitas']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

              

            <button type="submit" class=" w-[200px] bg-blue-600 p-4 rounded-full text-white mx-auto">Simpan</button>

            </form>
        </div>
    </div>
    </div>


