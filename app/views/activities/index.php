<!-- app/views/user/index.php -->
<h2>Daftar Pengguna</h2>
<a href="/activities/create">Tambah Pengguna Baru</a>
<ul>
    <?php foreach ($activities as $activities): ?>
        <div>
            <p><?= htmlspecialchars($activities['nama_aktivitas']) ?> - <?= htmlspecialchars($activities['deskripsi']) ?> - <?= htmlspecialchars($activities['lokasi_aktivitas']) ?> - <?= htmlspecialchars($activities['harga_aktivitas']) ?>
            <a href="/activities/edit/<?php echo $activities['id_aktivitas']; ?>">Edit</a> |
            <a href="/activities/delete/<?php echo $activities['id_aktivitas']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</ul>
