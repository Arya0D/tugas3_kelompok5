<!-- app/views/user/create.php -->
<h2>Tambah Pengguna Baru</h2>
<form action="/user/store" method="POST">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <label for="email">Nomor Telepon:</label>
    <input type="number" name="nomor_telepon" id="nomor_telepon" required>
    <button type="submit">Simpan</button>
</form>
