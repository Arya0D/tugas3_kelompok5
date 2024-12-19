<div class="p-3" >
        <h2 class="text-black uppercase text-center text-6xl font-bold p-4">Table Reservasi</h2>
        <table id="table" class="display">
        <a href="/reservation/create" class="bg-sky-700 p-3 relative top-[30px] rounded-md text-white font-bold z-10"><button class="btn btn-add">Tambah</button></a>
    <thead class="bg-blue-300">
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
            <td class="<?= ($x['status_pembayaran'])?"text-green-700":"text-red-700";?>"><?= ($x['status_pembayaran'])?"Sudah Dibayar":"Belum di bayar";?></td>
            <td class="text-white flex items-center justify-between gap-2">
                            <a href="/reservation/edit/<?php echo $x['id_reservasi']; ?>" class="w-full h-8 bg-sky-700 p-1 flex items-center justify-center rounded-xl"><i class="ri-pencil-fill"></i></a>
                            <a href="/reservation/delete/<?php echo $x['id_reservasi']; ?>" class="w-full h-8 bg-red-700 p-1 flex items-center justify-center rounded-xl" onclick="return confirm('Are you sure?')"><i class="ri-delete-bin-7-fill"></i></a>
                        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        <div style="text-align: right;">
    </div>


