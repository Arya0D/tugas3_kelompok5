<!-- app/views/accommodations/create.php -->
<h2>Tambah Pengguna Baru</h2>
<form action="/accommodations/store" method="POST">
    <label for="nama_penginapan">Nama:</label>
    <input type="text" name="nama_penginapan" id="nama_penginapan" required>
    <label for="lokasi">Lokasi:</label>
    <input type="text" name="lokasi" id="lokasi" required>
    <label for="fasilitas">Fasilitas:</label>
    <input type="text" name="fasilitas" id="fasilitas" required>
    <label for="harga">Harga:</label>
    <input type="text" name="harga" id="harga" required>
    <label for="id_aktivitas">aktivitas:</label>
    <select name="aktivitas" id="">
    <?php foreach ($activities as $x): ?>
        <option value="<?=$x['id_aktivitas'] ?>"><?=$x['nama_aktivitas']?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Simpan</button>
</form>
