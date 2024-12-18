<div class="flex h-full">

<div class="flex-1 p-4 h-full">
    <div class="flex gap-3 justify-center flex-wrap mb-10">
        <div class="flex  bg-slate-300 p-3 flex-1 rounded-md">
            <img src="/images/user.png" alt="" width="100">
            <div class="m-auto text-center font-bold uppercase">
            <h1 class="text-2xl">Pelanggan</h1>
            <div><?= $this->model->getTableRow("users")?></div>
            </div>
            
        </div>
        <div class="flex  bg-slate-300 p-3 flex-1 rounded-md">
            <img src="/images/reservation.png" alt="" width="100">
            <div class="m-auto font-bold uppercase">
            <h1 class="text-2xl">Reservasi</h1>
            <div class="text-right"><?= $this->model->getTableRow("reservations")?></div>
            </div>
            
        </div>
        <div class="flex  bg-slate-300 p-3 flex-1 rounded-md">
            <img src="/images/accommodations.png" alt="" width="100">
            <div class="m-auto text-center font-bold uppercase">
            <h1 class="text-2xl">Akomodasi</h1>
            <div><?= $this->model->getTableRow("accommodations")?></div>
            </div>
            
        </div>
        <div class="flex  bg-slate-300 p-3 flex-1 rounded-md">
            <img src="/images/activitie.png" alt="" width="100">
            <div class="m-auto text-center font-bold uppercase">
            <h1 class="text-2xl">aktivitas</h1>
            <div><?= $this->model->getTableRow("activities")?></div>
            </div>
            
        </div>
     
</div>
<div>
    <h1 class="text-xl font-bold mb-2 uppercase">Reservasi Minggu ini</h1>
   <table class="display w-full rounded-xl" id="table">
    <thead>
    <tr class="text-center">
        <th>Nama pelanggan</th>
        <th>Penginapan</th>
        <th>Tanggal Reservasi</th>
    </tr>
    </thead>
   <tbody>
   <?php foreach($reservation as $x): ?>
    <tr>
       
            <td><?=$x["nama"]?></td>
            <td><?=$x["nama_penginapan"]?></td>
            <td><?=$x["tanggal_reservasi"]?></td>
            
    </tr>
    <?php endforeach; ?>
   </tbody>
   
   </table>
</div>
</div>