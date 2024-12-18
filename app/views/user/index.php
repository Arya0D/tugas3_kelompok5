<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Users</title>
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
            width: 1200px;
            background-color:rgb(88, 86, 86);
            border-radius: 8px;
            padding: 20px;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4a90e2;
            font-weight: bold;
        }
        td {
            background-color: #777;
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
        <h2 style="text-align: center; color: white;">Table Users</h2>
        <table id="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['nama']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['nomor_telepon']) ?></td>
                        <td>
                            <a href="/user/edit/<?php echo $user['id_user']; ?>" class="btn btn-edit">Edit</a> |
                            <a href="/user/delete/<?php echo $user['id_user']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="text-align: right;">
       
        <a href="/user/create" style="display: inline-block; margin-bottom: 10px; color: #4a90e2; text-decoration: none;"><button class="btn btn-add">Tambah</button></a>
            <button class="btn btn-exit">Exit</button>
        </div>
    </div>
</body>
</html>
