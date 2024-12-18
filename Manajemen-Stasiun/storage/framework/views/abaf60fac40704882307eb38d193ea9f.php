<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($point->name); ?> - <?php echo e($point->latitude); ?> - <?php echo e($point->longitude); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    
</body>
</html><?php /**PATH C:\Users\iivan\OneDrive\Documents\Tugas_Kuliah\Tingkat 4\capstot\Capstone-PIDS\Manajemen-Stasiun\resources\views\seeOutput.blade.php ENDPATH**/ ?>