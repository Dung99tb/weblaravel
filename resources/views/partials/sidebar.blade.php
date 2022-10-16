<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('admins/images/logo.png') }}" alt="logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3 pb-3 mb-3 d-flex">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Quản lý người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Danh mục sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menus.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Sản phẩm
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sales.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Sales
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Cài đặt
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Vai trò
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('permissions.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Permissions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('customerHome')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Go To Web
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
