<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/books*') ? 'active' : ''); ?>" href="/dashboard/books">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Data Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/categories*') ? 'active' : ''); ?>" href="/dashboard/categories">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/discounts*') ? 'active' : ''); ?>" href="/dashboard/discounts">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Promo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('dashboard/fotos*') ? 'active' : ''); ?>" href="/dashboard/fotos">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Galeri
                </a>
            </li>
        </ul>

        

    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\toko-buku\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>