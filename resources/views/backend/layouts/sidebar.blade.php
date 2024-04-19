<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="push-menu" role="button"><i class="bi bi-list"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light text-center">Core *</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employee.index') }}"
                       class="nav-link
                       {{
                            (\Illuminate\Support\Facades\Route::is('employee.index') ||
                            \Illuminate\Support\Facades\Route::is('employee.create') ||
                            \Illuminate\Support\Facades\Route::is('employee.edit'))? 'active' : ''
                       }}">
                        <p>Nhân viên</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('salary.index') }}"
                       class="nav-link {{
                            (\Illuminate\Support\Facades\Route::is('salary.index') ||
                            \Illuminate\Support\Facades\Route::is('salary.create') ||
                            \Illuminate\Support\Facades\Route::is('salary.edit'))? 'active' : ''
                       }}">
                        <p>Hồ sơ lương</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contract.index') }}"
                       class="nav-link {{
                            ((\Illuminate\Support\Facades\Route::is('contract.index') ||
                            \Illuminate\Support\Facades\Route::is('contract.create')) ||
                            \Illuminate\Support\Facades\Route::is('contract.edit'))? 'active' : ''
                       }}">
                        <p>Hợp đồng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('appendix.index') }}"
                       class="nav-link {{
                            ((\Illuminate\Support\Facades\Route::is('appendix.index') ||
                            \Illuminate\Support\Facades\Route::is('appendix.create')) ||
                            \Illuminate\Support\Facades\Route::is('appendix.edit'))? 'active' : ''
                       }}">
                        <p>Phụ lục</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reward_discipline.index') }}"
                       class="nav-link {{
                            ((\Illuminate\Support\Facades\Route::is('reward_discipline.index') ||
                            \Illuminate\Support\Facades\Route::is('reward_discipline.create')) ||
                            \Illuminate\Support\Facades\Route::is('reward_discipline.edit'))? 'active' : ''
                       }}">
                        <p>Khen thưởng/Kỉ luật</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('allowance_subsidy.index') }}"
                       class="nav-link {{
                            ((\Illuminate\Support\Facades\Route::is('allowance_subsidy.index') ||
                            \Illuminate\Support\Facades\Route::is('allowance_subsidy.create')) ||
                            \Illuminate\Support\Facades\Route::is('allowance_subsidy.edit'))? 'active' : ''
                       }}">
                        <p>Phụ cấp/trợ cấp</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
           data-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Đức Phú</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Tài khoản</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
        </ul>
    </div>
</aside>
<!-- /.Main Sidebar Container -->

