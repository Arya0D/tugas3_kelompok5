<!-- app/views/accommodations/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Accommodations</title>
</head>
<body>
    <h2>Edit Accommodations</h2>
    <form action="/accommodations/update/<?php echo $accommodations['id_penginapan']; ?>" method="POST">
        <label for="nama_penginapan">nama_penginapan:</label>
        <input type="text" id="nama_penginapan" name="nama_penginapan" value="<?php echo $accommodations['nama_penginapan']; ?>" required>
        <br>
        <label for="lokasi">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi" value="<?php echo $accommodations['lokasi']; ?>" required>
        <br>
        <label for="fasilitas">Fasilitas:</label>
        <input type="text" id="fasilitas" name="fasilitas" value="<?php echo $accommodations['fasilitas']; ?>" required>
        <br>
        <label for="harga">harga:</label>
        <input type="text" id="harga" name="harga" value="<?php echo $accommodations['harga']; ?>" required>
        <br>

        <label for="id_aktivitas">aktivitas:</label>
        <select name="aktivitas" id="">
            <option value=""><?=$accommodations["nama_aktivitas"]?></option>
        <?php foreach ($activities as $x): ?>
        <option value="<?=$x['id_aktivitas'] ?>"><?=$x['nama_aktivitas']?></option>
        <?php endforeach; ?>
    </select>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/accommodations/index">Back to List</a>
</body>
</html>