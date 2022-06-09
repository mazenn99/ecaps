<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{route('dashboard.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Admins
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('invest.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Investors
                </p>
            </a>
        </li>
        <li class="nav-item">
            <form action="{{route('logout')}}" method="POST">
                <button class="nav-link btn-danger">
                    @csrf
                    <p class="text-white">
                        Logout
                    </p>
                </button>
            </form>
        </li>
    </ul>
</nav>
