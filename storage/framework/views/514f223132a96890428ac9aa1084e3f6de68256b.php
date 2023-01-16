

<?php $__env->startSection('container'); ?>
    <h1 class="mb-3">Buku Rekomendasi</h1>

    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    
                    <div class="card" style="width: 12em; ">
                        <img src="<?php echo e(asset('storage/' . $book->image)); ?>" class="card-img-top" alt="<?php echo e($book->tittle); ?>"
                                                class="img-fluid ">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/books/<?php echo e($book['slug']); ?>"><?php echo e($book['tittle']); ?></a></h5>
                            <p class="card-text"><?php echo e($book['pengarang']); ?></p>
                            <br>
                            <small class="card-text">Rp <?php echo e($book['harga']); ?></small>

                        </div>
                    </div>
                
                        
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/books.blade.php ENDPATH**/ ?>