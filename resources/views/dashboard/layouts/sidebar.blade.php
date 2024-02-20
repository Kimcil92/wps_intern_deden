<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/img/favicon.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link @yield('dashboard')">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            @if(auth()->user()->level->name != 'Staff Keuangan' && auth()->user()->level->name != 'Staff Oprasional')
                <li class="nav-header">Log Bawahan</li>
                <li class="nav-item">
                    <a href="/approve" class="nav-link @yield('verifikasi-log')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Verifikasi Log Bawahan
                        </p>
                    </a>
                </li>
            @endif

            @if(auth()->user()->level->name != 'Direktur Utama')
                <li class="nav-header">Log Harian</li>
                <li class="nav-item">
                    <a href="/daily" class="nav-link @yield('daily-task')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kerjaan Harian
                        </p>
                    </a>
                </li>
            @endif

            <li class="nav-header">Logout</li>
            <li class="nav-item">
                <a href="/logout" class="nav-link">
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
