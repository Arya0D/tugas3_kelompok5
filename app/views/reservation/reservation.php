<h2>Daftar Pengguna</h2>
<a href="/reservation/create">Tambah Pengguna Baru</a>

<table id="table" class="display">
    <thead>
        <tr>
            <th>Pelanggan</th>
            <th>Penginapan</th>
            <th>Tanggal Reservasi</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservation as $x): ?>
        <tr>
            <td><?= htmlspecialchars($x['nama']) ?></td>
            <td><?= htmlspecialchars($x['nama_penginapan']) ?></td>
            <td><?= htmlspecialchars($x['tanggal_reservasi']) ?></td>
            <td><?= htmlspecialchars($x['status_pembayaran']) ?></td>
            <td>
                <a href="/reservation/edit/<?= $x['id_reservasi'] ?>">Edit</a> |
                <a href="/reservation/delete/<?= $x['id_reservasi'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
