

<?php $__env->startSection('container'); ?>
    <div class="row justify-content-center">
        <div class="col-md-4">

            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>


            <?php if(session()->has('loginError')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('loginError')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/login" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" autofocus required>
                        <label for="email" class="form-label">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" required>
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-primary">Submit</button>
                    <small class="d-block text-center mt-3">Belum punya akun ? <a href="/register">Daftar dong</a></small>
                </form>
            </main>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/login/index.blade.php ENDPATH**/ ?>