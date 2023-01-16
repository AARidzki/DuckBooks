

<?php $__env->startSection('container'); ?>
    
        <h2>
            <?php echo e($book['tittle']); ?>

        </h2>
        <h5><?php echo e($book['penulis']); ?></h5>
    

    <a href="/books">Back To Books</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/book.blade.php ENDPATH**/ ?>