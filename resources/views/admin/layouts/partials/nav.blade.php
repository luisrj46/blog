<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

      <li class="nav-item ">
            <a href="{{ route('dashboard') }}" class="nav-link {{setActiveUrl('dashboard')}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
        </li>
      <li class="nav-item {{setActiveUrl('admin.post.index')}}">
        <a href="#" class="nav-link {{setActiveUrl('admin.post.index')}}">
          <i class="nav-icon fas fa-bars"></i>
          <p>
            Posts
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview ">
          <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link {{setActiveUrl('admin.post.index')}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Listar</p>
            </a>
          </li>
          @can('create',new App\Models\Pos)

          <li class="nav-item">
              @if (request()->is('admin/post/*'))
              <a href="{{ route('admin.post.index', '#create') }}" class="nav-link {{setActiveUrl('admin/post.crear')}}">
                <i class="far fa-edit nav-icon"></i>
                <p>Crear</p>
              </a>
              @else
              <a href="#" data-toggle="modal" data-target="#modal-crear-post" class="nav-link {{setActiveUrl('admin/post.crear')}}">
                <i class="far fa-edit nav-icon"></i>
                <p>Crear</p>
              </a>
              @endif

          </li>
          @endcan

        </ul>
      </li>
      @can('view',new App\Models\User)

    <li class="nav-item {{setActiveUrl(['admin.user.index','admin.user.create'])}}">
            <a href="#" class="nav-link {{setActiveUrl(['admin.user.index','admin.user.create'])}}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link {{setActiveUrl('admin.user.index')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar Usuarios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.create') }}" class="nav-link {">
                    <i class="far fa-edit nav-icon"></i>
                    <p>Crear Usuario</p>
                </a>


            </li>
            </ul>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ route('admin.user.show',Auth::user()) }}" class="nav-link {{setActiveUrl(['admin.user.show','admin.user.edit'])}}">
            <i class="far fa-circle nav-users"></i>
            <p>Perfil</p>
            </a>
        </li>
        @endcan
        @can('view',new Spatie\Permission\Models\Role)
            <li class="nav-item {{setActiveUrl(['admin.role.index','admin.role.create'])}}">
                <a href="#" class="nav-link {{setActiveUrl(['admin.role.index','admin.role.create'])}}">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Roles
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.role.index') }}" class="nav-link {{setActiveUrl('admin.role.index')}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Roles</p>
                    </a>
                </li>
                </ul>
            </li>
    @endcan

    @can('view', new Spatie\Permission\Models\Permission)
        <li class="nav-item {{setActiveUrl(['admin.permissions.index','admin.permissions.create'])}}">
            <a href="#" class="nav-link {{setActiveUrl(['admin.permissions.index','admin.permissions.create'])}}">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Permisos
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link {{setActiveUrl('admin.permissions.index')}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Permiso</p>
                    </a>
                </li>
            </ul>
        </li>
    @endcan


    </ul>
  </nav>
