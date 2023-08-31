<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

<!-- Sidebar -->
<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ui-avatars.com/api/?name=Aung%20Thu%20Htut" class="img-circle elevation-2 mt-3" alt="User Image">
        </div>
        <div class="info mt-0">
          <a href="#" class="d-block">{{auth()->guard('admin_users')->user()->name}}</a>
          <a href="#" class="d-block">{{auth()->guard('admin_users')->user()->phone}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link @yield('home-active')">
                <i class="fas fa-users-cog"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.admin-user.index')}}" class="nav-link @yield('admin-user-active')">
                <i class="fas fa-user"></i>
                  <p>Admin User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link @yield('users-active')">
                <i class="fas fa-users"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.wallet.index')}}" class="nav-link @yield('wallet-active')">
                
                <i class="fas fa-wallet"></i>
                  <p>Wallet</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>