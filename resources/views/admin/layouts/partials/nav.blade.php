<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

      <li class="nav-item ">
            <a href="{{ route('dashboard') }}" class="nav-link {{request()->is('dashboard')?'active':''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link {{request()->is('admin/post*')?'active':''}}">
          <i class="nav-icon fas fa-bars"></i>
          <p>
            Blogs
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link {{request()->is('admin/post')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Listar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.post.crear') }}" class="nav-link {{request()->is('admin/post.crear')?'active':''}}">
              <i class="far fa-edit nav-icon"></i>
              <p>Crear</p>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
