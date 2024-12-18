<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit Aktivitas</h2>
    <form action="/activities/update/<?php echo $activities['id_aktivitas']; ?>" method="POST">
        <label for="nama_aktivitas">Nama Aktivitas:</label>
        <input type="text" id="nama_aktivitas" name="nama_aktivitas" value="<?php echo $activities['nama_aktivitas']; ?>" required>
        <br>
        <label for="deskripsi">Deskripsi:</label>
        <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $activities['deskripsi']; ?>" required>
        <br>
        <label for="lokasi_aktivitas">Lokasi:</label>
        <input type="text" id="lokasi_aktivitas" name="lokasi_aktivitas" value="<?php echo $activities['lokasi_aktivitas']; ?>" required>
        <br>
        <label for="harga_aktivitas">Harga:</label>
        <input type="number" id="harga_aktivitas" name="harga_aktivitas" value="<?php echo $activities['harga_aktivitas']; ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/activities/index">Back to List</a>
</body>
</html>