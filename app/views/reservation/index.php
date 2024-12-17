<!-- app/views/reservation/index.php -->
<h2>Daftar Pengguna</h2>
<a href="/reservation/create">Tambah Pengguna Baru</a>
<table border="1" cellpadding="5" cellspacing="0"></br>
    <thead>
        <tr>
            <th>Pelanggan</th>
            <th>Penginapan</th>
            <th>Tanggal Reservasi</th>=
            <th>Status Pembayaran</th>

<table>
    <tr>
        <th></th>
    </tr>
    <?php foreach ($reservation as $x): ?>
        <div>
            <p><?= htmlspecialchars($x['nama']) ?> - <?= htmlspecialchars($x['nama_penginapan']) ?> - <?= htmlspecialchars($x['tanggal_reservasi'])?>- <?= htmlspecialchars($x['status_pembayaran']) ?>
            <a href="/reservation/edit/<?php echo $x['id_reservasi']; ?>">Edit</a> |
            <a href="/reservation/delete/<?php echo $x['id_reservasi']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
    </table>
