<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('image/Foodlogo3.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('image/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->username}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       
          @if (auth()->check() && auth()->user()->role->role == "admin")
            <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link" id="dashboard">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Dashboard
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('slider.index')}}" class="nav-link" id="slider">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Slider
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>

            
              <li class="nav-item">
                <a href="{{route('size.index')}}" class="nav-link" id="size">
                  <i class="nav-icon fas fa-weight"></i>
                  <p>Product Sizes</p>
                </a>
              </li>
            
          

          <li class="nav-item" id="vendors">
            <a href="#" class="nav-link" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Vendors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pendingvendor.index')}}" class="nav-link" id="pendingvendors">
                  <p>Pending Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('approvedvendors.index')}}" class="nav-link" id="approvedvendors">
                  <p>Approved Vendors</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item" id="orders">
            <a href="#" class="nav-link" >
              <i class="nav-icon fas fa-truck"></i>
              <p>
                orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('order.pending')}}" class="nav-link" id="pendingorder">
                  <p>Pending Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('order.approve')}}" class="nav-link" id="approvedorder">
                  <p>Approved Orders</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
                <a href="{{route('admin.userdetail.index')}}" class="nav-link" id="userdetail">
                  <i class="nav-icon fas fa-user-tag"></i>
                  <p>
                    User Detail
                  </p>
                </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.profile')}}" class="nav-link" id="profile">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                    Profile Setting
                </p>
              </a>
          </li>

           <li class="nav-item">
              <a href="{{route('contact.index')}}" class="nav-link" id="contact">
                <i class="nav-icon fas fa-comment-dots"></i>
                <p>
                    Contacts
                </p>
              </a>
          </li>

          <li class="nav-item">
                <a href="/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    {{ __('Logout') }}
                  </p>
                </a>
          </li>

          @elseif (auth()->check() && auth()->user()->role->role == "vendor")
              <li class="nav-item">
                <a href="{{route('vendor.dashboard')}}" class="nav-link" id="dashboard">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('vendor.profile')}}" class="nav-link" id="profile">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>
                    Profile Setting
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('vendor.view')}}" class="nav-link disabled" id="viewvendor">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>
                    Vendor Data
                  </p>
                </a>
              </li> --}}

              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link" id="product">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>
                    Product
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('vendor.orders')}}" class="nav-link" id="order">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                    Orders
                  </p>
                </a>
          </li>

              <li class="nav-item">
                <a href="{{route('vendor.userdetail.index')}}" class="nav-link" id="userdetail">
                  <i class="nav-icon fas fa-user-tag"></i>
                  <p>
                    User Detail
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    {{ __('Logout') }}
                  </p>
                </a>
              </li>
          @endif

          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>