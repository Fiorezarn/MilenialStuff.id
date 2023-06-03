        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('AdminLTE/dist') }}//img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Milenialstuff</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Halo, {{ Auth::user()->name }}</a>
                    </div>
                </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              </li>
              <li class="nav-item">
                <a href="{{ url('dashboard') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Product
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('dataitem') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sneakers</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('datatrending') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Trending</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('dataapparel') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Apparel</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('dataspecial1') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Special Offer 1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('dataspecial2') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Special Offer 2</p>
                    </a>
                  </li>
                </ul>
              </li>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('product') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
          </li>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
