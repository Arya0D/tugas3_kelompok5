<div class="p-3" >
        <h2 class="text-black uppercase text-center text-6xl font-bold p-4">Tabel Aktivitas</h2>
        <table id="table">
        <a href="/activities/create" class="bg-sky-700 p-3 relative top-[30px] rounded-md text-white font-bold z-10"><button class="btn btn-add">Tambah</button></a>
            <thead>
                <tr>
                    <th>Aktivitas</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activities as $a): ?>
                    <tr class="even:text-white">
                        <td><?= htmlspecialchars($a['nama_aktivitas']) ?></td>
                        <td><?= htmlspecialchars($a['deskripsi']) ?></td>
                        <td><?= htmlspecialchars($a['lokasi_aktivitas']) ?></td>
                        <td><?= htmlspecialchars($a['harga_aktivitas']) ?></td>

                        <td class="text-white flex items-center justify-between gap-2">
                            <a href="/activities/edit/<?php echo $a['id_aktivitas']; ?>" class="w-full h-8 bg-sky-700 p-1 flex items-center justify-center rounded-xl"><i class="ri-pencil-fill"></i></a>
                            <a href="/activities/delete/<?php echo $a['id_aktivitas']; ?>" class="w-full h-8 bg-red-700 p-1 flex items-center justify-center rounded-xl" onclick="return confirm('Are you sure?')"><i class="ri-delete-bin-7-fill"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="text-align: right;">
    </div>