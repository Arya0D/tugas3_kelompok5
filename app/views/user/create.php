<div class="h-screen bg-blue-200 py-10 px-28 flex">
    <!-- Section Kiri: Selamat Datang -->
    <div class="w-1/2 text-white">
        <h1 class="text-6xl font-bold uppercase">tambah data <span class="text-sky-500">pengguna</span></h1>
        <div class="relative">
        <img src="/images/user.png" alt="" class="absolute top-6 right-[calc(50%-30px)] translate-x-1/4 w-[350px]">
        </div>
    </div>

    <!-- Section Kanan: Form Tambah Pengguna -->
    <div class="bg-white w-1/2 rounded-[24px] ">
        <div class="form-container">
            <form action="/user/store" method="POST" class="p-28 flex flex-col gap-4 h-full">
                <div class="flex flex-col">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="border-2 border-black rounded-full p-1 " id="nama" required>
                </div>
               <div class="flex flex-col">
               <label for="email">Email:</label>
                <input type="email" name="email" class="border-2 border-black rounded-full p-1" id="email" required>
               </div>
              <div class="flex flex-col">
              <label for="nomor_telepon">Nomor Telepon:</label>
              <input type="number" name="nomor_telepon" class="border-2 border-black rounded-full p-1" id="nomor_telepon" required>
              </div>
                <button type="submit" class="mt-10 w-[200px] bg-blue-600 p-4 rounded-full text-white mx-auto" color-blue>Simpan</button>
            </form>
        </div>
    </div>
    </div>