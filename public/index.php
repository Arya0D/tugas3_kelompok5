<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas3_Kelompok5</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="/public/style.css">
</head>
<style>
    .dt-length{
        display: none;
    }
</style>
<body  class=" bg-slate-100">
    <div class="h-full min-h-screen flex">
<div class="w-[120px]  bg-slate-200  p-1 pt-8">
    <div  class="sticky top-[32px]">
    <div class="w-full bg-black text-white p-2 text-center rounded-3xl">Kelompok 5</div>
<div class="mt-10 flex">
    <ul class="mx-auto flex flex-col gap-4">
    <a href="/" class="text-5xl"><i class="ri-home-2-fill"></i></a>
    
        <a  href="/user/index" class="text-5xl"><i class="ri-user-fill"></i></a>
    
        <a href="/activities/index" class="text-5xl"><i class="ri-run-line"></i></a>
   
        <a href="/reservation/index" class="text-5xl"><i class="ri-git-repository-fill"></i></a>
   
        <a href="/accommodations/index" class="text-5xl"><i class="ri-hotel-bed-fill"></i></a>
    </ul>
</div>
    </div>

</div>

    <div class="flex-1 h-full">
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// public/index.php
require_once '../routes.php';

?>
</div>
<script  src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js"></script>
<script>new DataTable('#table');</script>
</div>
</body>
</html>
