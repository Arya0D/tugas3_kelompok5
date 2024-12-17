<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna Baru</title>
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
        input {
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
        <p>Silahkan tambah data diri anda</p>
    </div>

    <!-- Section Kanan: Form Tambah Pengguna -->
    <div class="form-section">
        <div class="form-container">
            <h2>Tambah Pengguna Baru</h2>
            <form action="/user/store" method="POST">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="number" name="nomor_telepon" id="nomor_telepon" required>

                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
