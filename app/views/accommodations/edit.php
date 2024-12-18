<div class="h-screen bg-blue-200 py-10 px-28 flex">
    <!-- Section Kiri: Selamat Datang -->
    <div class="w-1/2 text-white">
        <h1 class="text-6xl font-bold uppercase">edit data <span class="text-sky-500">akomodasi</span></h1>
        <div class="relative">
        <img src="/images/accommodations.png" alt="" class="absolute top-6 right-[calc(50%-30px)] translate-x-1/4 w-[350px]">
        </div>
    </div>

    <!-- Section Kanan: Form Tambah Pengguna -->
    <div class="bg-white w-1/2 rounded-[24px] ">
        <div class="form-container">
        <form action="/accommodations/update/<?php echo $accommodations['id_penginapan']; ?>" method="POST"class="p-12 flex flex-col gap-4 h-fit">
            <div class="flex flex-col">
            <label for="nama_penginapan">Nama Penginapan</label>
            <input type="text" id="nama_penginapan" name="nama_penginapan" class="border-2 border-black rounded-xl p-1 " value="<?php echo htmlspecialchars($accommodations['nama_penginapan']); ?>" required>
            </div>
            <div  class="flex flex-col">
            <label for="lokasi_penginapan">Lokasi</label>
            <input type="text" id="lokasi_penginapan" name="lokasi_penginapan"class="border-2 border-black rounded-xl p-1 "  value="<?php echo htmlspecialchars($accommodations['lokasi_penginapan']); ?>" required>
            </div>
            <div  class="flex flex-col">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" class="border-2 border-black rounded-xl p-1 " value="<?php echo htmlspecialchars($accommodations['fasilitas']); ?>" required>
            </div>
            <div  class="flex flex-col">
            <label for="harga_penginapan">Harga</label>
            <input type="number" id="harga_penginapan" name="harga_penginapan" class="border-2 border-black rounded-xl p-1 " value="<?php echo htmlspecialchars($accommodations['harga_penginapan']); ?>" required>
            </div>
            <div  class="flex flex-col">
            <label for="id_aktivitas">Aktivitas</label>
            <select name="aktivitas" id="" class="border-2 border-black rounded-xl p-1 ">
                
                <option value="<?=$accommodations['id_aktivitas']; ?>"><?php echo htmlspecialchars($accommodations['nama_aktivitas']); ?></option>
                <option value="">Pilih Aktivitas</option> 
                <?php foreach ($activities as $x): ?>
                    <option value="<?= $x['id_aktivitas']; ?>"><?php echo htmlspecialchars($x['nama_aktivitas']); ?></option>
                <?php endforeach; ?>
            </select>
            </div>
            <button type="submit" class=" w-[200px] bg-blue-600 p-4 rounded-xl text-white mx-auto">Simpan</button>

        </form>
        </div>
    </div>
    </div>
