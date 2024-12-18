<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
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
            background-color: #f8f9fa;
        }

        /* Bagian Kiri */
        .left-section {
            background-color: #57a8ff;
            color: black;
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-top-right-radius: 200px;
            border-bottom-right-radius: 200px;
            padding: 20px;
        }

        .left-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .left-section p {
            font-size: 1.1rem;
        }

        /* Bagian Kanan */
        .right-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            flex-direction: column;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin-bottom: 30px;
        }

        .form-container h2 {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container label {
            margin-top: 10px;
            font-weight: bold;
        }

        .form-container input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 5px;
            font-size: 1rem;
        }

        .form-container button {
            margin-top: 20px;
            background-color: #57a8ff;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0px 2px 5px #ccc;
        }

        .form-container button:hover {
            background-color: #4993e0;
        }
    </style>
</head>
<body>
    <!-- Bagian Kiri -->
    <div class="left-section">
        <h1>Selamat Datang</h1>
        <p>Silahkan tambah data pengguna atau aktivitas anda</p>
    </div>



        <!-- Form Tambah Aktivitas -->
        <div class="form-container">
            <h2>Tambah Aktivitas</h2>
            <form action="/activities/store" method="POST">
                <label for="nama_aktivitas">Nama Aktivitas</label>
                <input type="text" id="nama_aktivitas" name="nama_aktivitas" placeholder="Masukkan nama aktivitas" required>

                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required>

                <label for="lokasi_aktivitas">Lokasi</label>
                <input type="text" id="lokasi_aktivitas" name="lokasi_aktivitas" placeholder="Masukkan lokasi" required>

                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" placeholder="Masukkan harga" required>

                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
