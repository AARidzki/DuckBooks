

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Promo</h1>
    </div>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success col-lg-8" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/discounts/create" class="btn btn-primary mb-3">Create new Promo</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Kode Promo</th>
                    <th scope="col">Promo</th>
                    <th scope="col">Masa Berlaku</th>
                    <th scope="col">Sampai Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($discount->books->tittle); ?></td>
                        <td><?php echo e($discount->kode_promo); ?></td>
                        <td><?php echo e($discount->promo); ?></td>
                        <td><?php echo e($discount->expire); ?></td>
                        <td><?php echo e($discount->count); ?></td>
                        <td>
                            <a href="/dashboard/discounts/<?php echo e($discount->id); ?>" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/discounts/<?php echo e($discount->id); ?>/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/discounts/<?php echo e($discount->id); ?>" method="post" class="d-inline">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/dashboard/discounts/index.blade.php ENDPATH**/ ?>