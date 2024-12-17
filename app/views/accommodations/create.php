<!-- app/views/accommodations/create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penginapan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .welcome-section {
            width: 50%;
            background-color: #4a90e2;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-radius: 0 100px 100px 0;
        }
        .welcome-section h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .form-section {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
        }
        .form-container {
            width: 80%;
            max-width: 400px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #000;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        button {
            padding: 10px 20px;
            background-color: #4a90e2;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #3a78c2;
        }
    </style>
</head>
<body>
    <!-- Section Kiri: Selamat Datang -->
    <div class="welcome-section">
        <h2>Selamat Datang</h2>
        <p>Silahkan tambah data penginapan anda</p>
    </div>

    <!-- Section Kanan: Form Tambah Penginapan -->
    <div class="form-section">
        <div class="form-container">
            <h2>Tambah Data Penginapan</h2>
            <form action="/accommodations/store" method="POST">
                <label for="nama_penginapan">Nama:</label>
                <input type="text" name="nama_penginapan" id="nama_penginapan" required>

                <label for="lokasi_penginapan">Lokasi:</label>
                <input type="text" name="lokasi_penginapan" id="lokasi_penginapan" required>

                <label for="fasilitas">Fasilitas:</label>
                <input type="text" name="fasilitas" id="fasilitas" required>

                <label for="harga_penginapan">Harga:</label>
                <input type="number" name="harga_penginapan" id="harga_penginapan" required>

                <label for="id_aktivitas">Aktivitas:</label>
                <select name="aktivitas" id="">
                    <?php foreach ($activities as $x): ?>
                        <option value="<?= htmlspecialchars($x['id_aktivitas']) ?>">
                            <?= htmlspecialchars($x['nama_aktivitas']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
