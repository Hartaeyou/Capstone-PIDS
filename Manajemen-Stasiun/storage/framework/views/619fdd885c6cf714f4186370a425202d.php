<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo e(route('inputStasiun')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <label for="Name">Nama</label>
        <input type="text" name = "Name" id = "Name">

        <label for="Longitude">Longitude</label>
        <input type="text" name = "Longitude" id = "Longitude">

        <label for="Latitude">Latitude</label>
        <input type="text" name = "Latitude" id = "Longitude">

        <label for="position">Posisi</label>
        <input type="number" name="position" id="position" placeholder="Masukkan posisi (opsional)">
<!-- 
        <label for="Name">Prev</label>
        <input type="text" name = "Longitude" id = "Longitude">

        <label for="Name">Prev</label>
        <input type="text" name = "Longitude" id = "Longitude"> -->

        <button type="submit">Submit</button>
    </form>
</body>
</html><?php /**PATH C:\Users\iivan\OneDrive\Documents\Tugas_Kuliah\Tingkat 4\capstot\Capstone-PIDS\Manajemen-Stasiun\resources\views/inputStasiun.blade.php ENDPATH**/ ?>