<!-- app/views/user/index.php -->
<h2>Daftar Pengguna</h2>
<a href="/user/create">Tambah Pengguna Baru</a>
<table border="1" cellpadding="5" cellspacing="0"></br>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>


<table>
    <tr>
        <th></th>
    </tr>
    <?php foreach ($users as $user): ?>
        <div>
            <p><?= htmlspecialchars($user['nama']) ?> - <?= htmlspecialchars($user['email']) ?> - <?= htmlspecialchars($user['nomor_telepon']) ?>
            <a href="/user/edit/<?php echo $user['id_user']; ?>">Edit</a> |
            <a href="/user/delete/<?php echo $user['id_user']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
    </table>
