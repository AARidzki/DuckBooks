

<?php $__env->startSection('container'); ?>
    
    <h1>Halaman About</h1>
    <br>
    <h3><?php echo e($nama); ?></h3>
    <p><?php echo e($email); ?></p>
    <img src="img/nurul1.JPG" alt="uyun.jpg" width="200">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/about.blade.php ENDPATH**/ ?>