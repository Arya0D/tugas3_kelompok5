<!-- app/views/user/create.php -->
<h2>Tambah Pengguna Baru</h2>
<form action="/reservation/store" method="POST">
    <label for="">Tanggal:</label>
    <input type="date" name="tanggal" id="tanggal" required>
    <label for="">Status:</label>
    <select name="status_pembayaran" id="status_pembayaran">
        <option value="false">Belum dibayar</option>
        <option value="false">Sudah dibayar</option>
    </select>
    <label for="">Pelanggan:</label>
    <select name="user" id="user">
        <?php foreach($user as $u):?>
        <option value="<?=$u["id_user"]?>"><?=$u["nama"]?></option>
        <?php endforeach; ?>
    </select>
    <label for="">Penginapan:</label>
    <select name="penginapan" id="user">
        <?php foreach($accommadation as $a):?>
        <option value="<?=$a["id_penginapan"]?>"><?=$a["nama_penginapan"]?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Simpan</button>
</form>
