<!-- app/views/accommodations/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 950px;
            background-color: #6c6c6c;
            border-radius: 8px;
            padding: 20px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4a90e2;
            font-weight: bold;
        }
        td {
            background-color: #777;
        }
        tr:hover td {
            background-color:rgb(90, 90, 90);
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        .btn-edit {
            background-color: #4a90e2;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-add, .btn-exit {
            margin: 5px;
            padding: 10px 20px;
        }
        .btn-add {
            background-color: #4a90e2;
        }
        .btn-exit {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; color: white;">Daftar Pengguna</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Penginapan</th>
                    <th>Lokasi</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Nama Aktivitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accommodations as $accommodations): ?>
                <tr>
                    <td><?= htmlspecialchars($accommodations['nama_penginapan']) ?></td>
                    <td><?= htmlspecialchars($accommodations['lokasi_penginapan']) ?></td>
                    <td><?= htmlspecialchars($accommodations['fasilitas']) ?></td>
                    <td><?= htmlspecialchars($accommodations['harga_penginapan']) ?></td>
                    <td><?= htmlspecialchars($accommodations['nama_aktivitas']) ?></td>
                    <td>
                        <a href="/accommodations/edit/<?php echo $accommodations['id_penginapan']; ?>" class="btn btn-edit">Edit</a> |
                        <a href="/accommodations/delete/<?php echo $accommodations['id_penginapan']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="text-align: right;">
            <a href="/accommodations/create" style="display: inline-block; margin-bottom: 10px; color: #4a90e2; text-decoration: none;"><button class="btn btn-add">Tambah</button></a>
            <button class="btn btn-exit">Exit</button>
        </div>
    </div>
</body>
</html>

