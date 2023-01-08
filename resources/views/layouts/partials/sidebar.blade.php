<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Book Lending</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (Auth::user())
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user())
                    @if (Auth::user()->role_id != 1)
                        <li class="nav-item">
                            <a href="/mytransaction" class="nav-link">
                                <i class="nav-icon fa fa-hourglass-half"></i>
                                <p>
                                    My Transaction
                                </p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-cloud"></i>
                                {{-- <i class="nav-icon fas fa-table"></i> --}}
                                <p>
                                    Admin Menu
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin-dashboard" class="nav-link">
                                        <i class="nav-icon fa fa-address-card"></i>
                                        <p>Admin Dashboard</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/books" class="nav-link">
                                        <i class="nav-icon fa fa-id-badge"></i>
                                        <p>Book</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/categories" class="nav-link">
                                        <i class="nav-icon fa fa-binoculars"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/students" class="nav-link">
                                        <i class="nav-icon fa fa-check-square"></i>
                                        <p>Student</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/transactions" class="nav-link">
                                        <i class="nav-icon fa fa-hourglass-half"></i>
                                        <p>Transaction</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
