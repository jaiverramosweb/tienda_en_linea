<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="{{asset('image/perfil.jpg')}}" alt="image"/>
          </div>
          <div class="profile-name">
            <p class="name">
              {{ Auth::user()->name }}
            </p>
            <p class="designation">
              {{ Auth::user()->email }}
            </p>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @can('category_index')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-tags menu-icon"></i>
            <span class="menu-title">Cregorias</span>
          </a>
        </li>
      @endcan

      @can('provider_index')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('providers.index') }}">
            <i class="fas fa-truck-moving menu-icon"></i>
            <span class="menu-title">Proveedores</span>
          </a>
        </li>
      @endcan

      @can('product_index')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-project-diagram menu-icon"></i>
            <span class="menu-title">Producto</span>
          </a>
        </li>
      @endcan

      @can('client_index')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('clients.index') }}">
          <i class="fa fa-users menu-icon"></i>
          <span class="menu-title">Clientes</span>
        </a>
      </li>
      @endcan

      @can('purchase_index')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('purchases.index') }}">
          <i class="fas fa-cart-plus menu-icon"></i>
          <span class="menu-title">Compras</span>
        </a>
      </li>
      @endcan

      @can('sale_index')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sales.index') }}">
          <i class="fas fa-shopping-cart menu-icon"></i>
          <span class="menu-title">Ventas</span>
        </a>
      </li>
      @endcan

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
          <i class="fa fa-user-times menu-icon"></i>
          <span class="menu-title">Usuarios</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            @can('user_index')
              <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('users.index') }}">Usuario</a></li>
            @endcan

            @can('role_index')
              <li class="nav-item"> <a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
            @endcan

            @can('permissions_index')
              <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('permissions.index') }}">Permisos</a></li>
            @endcan
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts2" aria-expanded="false" aria-controls="page-layouts2">

          <i class="fas fa-chart-bar menu-icon"></i>
          <span class="menu-title">Reportes</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts2">
          <ul class="nav flex-column sub-menu">
            @can('reports_day')
              <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('reports.day') }}">Dia</a></li>
            @endcan

            @can('reports_date')
              <li class="nav-item"> <a class="nav-link" href="{{ route('reports.date') }}">Fecha</a></li>
            @endcan
          </ul>
        </div>
      </li>
      
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/documentation.html">
          <i class="far fa-file-alt menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>