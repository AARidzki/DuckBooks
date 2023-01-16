

<?php $__env->startSection('container'); ?>
<div class="container">
    <div class="row my-3">
        <h1>belum ada ide ini halaman mau digimanain</h1>
        <h1><?php echo e($book->tittle); ?></h1>

        <div style="max-height: 350px;">
            <img src="<?php echo e(asset('storage/' . $book->image)); ?>"
                alt="<?php echo e($book->tittle); ?>" class="img-fluid mt-3">
        </div>
    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/dashboard/books/show.blade.php ENDPATH**/ ?>