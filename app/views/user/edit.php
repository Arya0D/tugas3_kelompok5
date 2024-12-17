<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna Baru</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(255, 255, 255);
            color: #000;
        }
        .form-container {
            background-color: #4A90E2;
            padding: 40px;
            border-radius: 10px;
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
            margin: 10px 0 5px;
            font-size: 16px;
            text-align: left;
            color: black;
        }
        input {
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input:focus {
            border-color: #007BFF;
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
            background-color: #6c757d;
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
        <h2>Edit Pengguna Baru</h2>
        <form action="/user/update/<?php echo $user['id_user']; ?>" method="POST">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($user['nama']); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" value="<?php echo htmlspecialchars($user['nomor_telepon']); ?>" required>

            <div class="button-container">
                <button type="reset" class="btn-reset">Reset</button>
                <button type="submit">Update</button>
            </div>
        </form>
        <a href="/user/index">Kembali ke Daftar</a>
    </div>
</body>
</html>
