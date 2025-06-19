<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center d-flex align-items-center justify-content-center" style="background-color: #87CEEB; height: 100px;">
        <img src="{{ asset('assets/img/profil.jfif')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="max-height: 60px;">
        <span class="brand-text text-dark">CoLearn</span>
    </a>
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-2 d-flex justify-content-center">
        <div class="info">
            <div class="info">
              <span class="text-primary">You Log In as: Admin</span>
            </div>
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
          <li class="nav-item">
              <a href="{{ url('halaman_utama') }}" class="nav-link">
              <i class="fa-solid fa-house"></i>
                  <p>
                      Dashboard
                  </p>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="{{ url('pengguna/show') }}" class="nav-link">
              <i class="fa-solid fa-address-card"></i>
                  <p>
                      Data Pengguna
                  </p>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="{{ url('admin/show') }}" class="nav-link">
              <i class="fa-solid fa-users-gear"></i>
                  <p>
                      Data Admin
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('jurusan/show') }}" class="nav-link">
              <i class="fa-solid fa-toolbox"></i>
                  <p>
                      Data Jurusan
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('peminatan/show') }}" class="nav-link">
              <i class="fa-solid fa-hand-holding-heart"></i>
                  <p>
                      Data Peminatan
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('diskusi/show') }}" class="nav-link">
              <i class="fa-solid fa-truck-fast"></i>
                  <p>
                      Data Diskusi
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('comment/show') }}" class="nav-link">
              <i class="fa-solid fa-truck-fast"></i>
                  <p>
                      Data Comment
                  </p>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="{{ url('profit-chart') }}" class="nav-link">
              <i class="fa-solid fa-chart-simple"></i>
                  <p>
                      Revenue Chart
                  </p>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa-solid fa-right-from-bracket"></i>
                  <p> Logout </p>
              </a>
              <form id="logout-form" action="#" method="POST" style="display: none;">
              </form>
          </li>
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>