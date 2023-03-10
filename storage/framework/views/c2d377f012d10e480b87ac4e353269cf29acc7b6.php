<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <div class="container">
        <a class="navbar-brand" href="/">Duck Book</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo e($tittle === 'Home' ? 'active' : ''); ?>" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Novel</a></li>
                        <li><a class="dropdown-item" href="#">Komik</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($tittle === 'About' ? 'active' : ''); ?>" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($tittle === 'Books' ? 'active' : ''); ?>" aria-current="page"
                        href="/books">Buku</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto me-auto">
                <li class="nav-item">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php if(auth()->guard()->check()): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome, <?php echo e(auth()->user()->name); ?>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard">
                            <li class="bi bi-layout-text-sidebar-reverse"></li> Dashboard</a></li>
                        <li>
                            <form action="/logout" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item"><li class="bi bi-box-arrow-right"></li> Logout</button>
                            </form>
                    </ul>
                </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/login" class="nav-link <?php echo e($active === 'login' ? 'active' : ''); ?>">
                            <i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/partials/navbar.blade.php ENDPATH**/ ?>