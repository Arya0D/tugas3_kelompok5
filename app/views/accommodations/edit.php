<!-- app/views/accommodations/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penginapan</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            background-color:rgb(234, 239, 245);
            color: #000;
        }
        .form-container {
            background-color: #4A90E2;
            padding: 20px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #000;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 5px 0 5px;
            font-size: 16px;
            text-align: left;
            color: black;
        }
        input, select {
            padding: 5px;
            margin-bottom: 5px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input:focus, select:focus {
            border-color:rgb(25, 119, 234);
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        button:active {
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .btn-reset {
            background-color:rgb(11, 113, 203);
        }
        a {
            display: inline-block;
            margin-top: 15px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="form-container">
        <h2>Edit Penginapan</h2>
        <form action="/accommodations/update/<?php echo $accommodations['id_penginapan']; ?>" method="POST">
            <label for="nama_penginapan">Nama Penginapan</label>
            <input type="text" id="nama_penginapan" name="nama_penginapan" value="<?php echo htmlspecialchars($accommodations['nama_penginapan']); ?>" required>

            <label for="lokasi_penginapan">Lokasi</label>
            <input type="text" id="lokasi_penginapan" name="lokasi_penginapan" value="<?php echo htmlspecialchars($accommodations['lokasi_penginapan']); ?>" required>

            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" value="<?php echo htmlspecialchars($accommodations['fasilitas']); ?>" required>

            <label for="harga_penginapan">Harga</label>
            <input type="number" id="harga_penginapan" name="harga_penginapan" value="<?php echo htmlspecialchars($accommodations['harga_penginapan']); ?>" required>

            <label for="id_aktivitas">Aktivitas</label>
            <select name="aktivitas" id="">
                
                <option value="<?=$accommodations['id_aktivitas']; ?>"><?php echo htmlspecialchars($accommodations['nama_aktivitas']); ?></option>
                <option value="">Pilih Aktivitas</option> 
                <?php foreach ($activities as $x): ?>
                    <option value="<?= $x['id_aktivitas']; ?>"><?php echo htmlspecialchars($x['nama_aktivitas']); ?></option>
                <?php endforeach; ?>
            </select>

            <div class="button-container">
                <button type="button" id='btn-reset' class="btn-reset">Reset</button>
                <button type="submit">Update</button>
            </div>
        </form>
        <a href="/accommodations/index">Kembali ke Tabel</a>
    </div>
    <script>
        document.getElementById('btn-reset').addEventListener('click', function(){
            document.getElementById("nama_penginapan").value = ''
            document.getElementById("lokasi_penginapan").value = ''
            document.getElementById("fasilitas").value = ''
            document.getElementById("harga_penginapan").value = ''
        })
    </script>
</body>
</html>