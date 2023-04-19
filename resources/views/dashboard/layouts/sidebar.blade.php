<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/orders*') ? 'active' : '' }}" aria-current="page" href="/dashboard/orders">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Data Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" aria-current="page" href="/dashboard/users">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Accounts
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/books*') ? 'active' : '' }}" href="/dashboard/books">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Data Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/discounts*') ? 'active' : '' }}" href="/dashboard/discounts">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Promo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/fotos*') ? 'active' : '' }}" href="/dashboard/fotos">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Galeri
                </a>
            </li> --}}
        </ul>

        @can('admin')
            
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/books*') ? 'active' : '' }}" href="/dashboard/books">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Data Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/discounts*') ? 'active' : '' }}" href="/dashboard/discounts">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Promo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/fotos*') ? 'active' : '' }}" href="/dashboard/fotos">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Data Galeri
                </a>
            </li>
        </ul>
        @endcan

    </div>
</nav>
