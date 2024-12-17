<!-- app/views/accommodations/index.php -->
<h2>Daftar Pengguna</h2>
<a href="/accommodations/create">Tambah Pengguna Baru</a>
<table border="1" style="width:100%; border-collapse: collapse; text-align: left;">
    <thead style="background-color:rgb(50, 142, 203);">
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
        <tr style="background-color: <?php echo $loopIndex % 2 == 0 ? '#ffffff' : '#f9f9f9'; ?>;">
            <td><?= htmlspecialchars($accommodations['nama_penginapan']) ?></td>
            <td><?= htmlspecialchars($accommodations['lokasi']) ?></td>
            <td><?= htmlspecialchars($accommodations['fasilitas']) ?></td>
            <td><?= htmlspecialchars($accommodations['harga']) ?></td>
            <td><?= htmlspecialchars($accommodations['nama_aktivitas']) ?></td>
            <td>
                <a href="/accommodations/edit/<?php echo $accommodations['id_penginapan']; ?>">Edit</a> |
                <a href="/accommodations/delete/<?php echo $accommodations['id_penginapan']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
