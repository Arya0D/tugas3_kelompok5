<!-- app/views/user/create.php -->
<div class="h-screen bg-blue-200 py-10 px-28 flex">
    <!-- Section Kiri: Selamat Datang -->
    <div class="w-1/2 text-white">
        <h1 class="text-6xl font-bold uppercase">tambah data <span class="text-sky-500">reservasi</span></h1>
        <div class="relative">
        <img src="/images/reservation.png" alt="" class="absolute top-6 right-[calc(50%-30px)] translate-x-1/4 w-[350px]">
        </div>
    </div>

    <!-- Section Kanan: Form Tambah Pengguna -->
    <div class="bg-white w-1/2 rounded-[24px] shadow-xl">
        <div class="form-container">
        <form action="/reservation/store" method="POST" class="p-28 flex flex-col gap-4 h-full">
            <div class="flex flex-col">
            <label for="">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="border-2 border-black rounded-xl p-1 " required>
            </div>
            <div class="flex flex-col">
            <label for="">Status:</label>
    <select name="status_pembayaran" id="status_pembayaran" class="border-2 border-black rounded-xl p-1 ">
        <option value="false">Belum dibayar</option>
        <option value="false">Sudah dibayar</option>
    </select>
            </div>
   <div class="flex flex-col">
   <label for="">Pelanggan:</label>
    <select name="user" id="user" class="border-2 border-black rounded-xl p-1 ">
        <?php foreach($user as $u):?>
        <option value="<?=$u["id_user"]?>"><?=$u["nama"]?></option>
        <?php endforeach; ?>
    </select>
   </div>
   
   <div class="flex flex-col">
   <label for="">Penginapan:</label>
    <select name="penginapan" id="user" class="border-2 border-black rounded-xl p-1 ">
        <?php foreach($accommadation as $a):?>
        <option value="<?=$a["id_penginapan"]?>"><?=$a["nama_penginapan"]?></option>
        <?php endforeach; ?>
    </select>
   </div>
   
   <button type="submit" class="mt-10 w-[200px] bg-blue-600 p-4 rounded-xl text-white mx-auto">Simpan</button>
</form>

        </div>
    </div>
    </div>
