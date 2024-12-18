<div class="p-3" >
        <h2 class="text-black uppercase text-center text-6xl font-bold p-4">Tabel Akomodasi</h2>
        <table id="table">
        <a href="/accommodations/create" class="bg-sky-700 p-3 relative top-[30px] rounded-md text-white font-bold z-10"><button class="btn btn-add">Tambah</button></a>
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
                    <td class="text-white flex items-center justify-between gap-2">
                            <a href="/accommodations/edit/<?php echo $accommodations['id_penginapan']; ?>" class="w-full h-8 bg-sky-700 p-1 flex items-center justify-center rounded-xl"><i class="ri-pencil-fill"></i></a>
                            <a href="/accommodations/delete/<?php echo $accommodations['id_penginapan']; ?>" class="w-full h-8 bg-red-700 p-1 flex items-center justify-center rounded-xl" onclick="return confirm('Are you sure?')"><i class="ri-delete-bin-7-fill"></i></a>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="text-align: right;">
    </div>