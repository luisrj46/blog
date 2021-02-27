
@extends('admin.layouts.layout')

@section('headerr')
    @include('admin.layouts.partials.starterPage',$pages=[
    ['name'=>'Listar Usuarios','route'=>'admin.user.index'],
    ['name'=>'Editar Usuarios','route'=>'admin.user.edit'],
    ])
@endsection
@section('contentt')

<div class="row">
    <div class="col-md-6">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Datos Personales</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($errors->any())
            <ul class="list-group">
                @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
            </ul>

            @endif
            <form method="POST" action="{{ route('admin.user.update', $user) }}" >
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name" >Nombre:</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$user->name)}}">
                </div>
                <div class="form-group">
                    <label for="email" >Email:</label>
                <input type="text" name="email" class="form-control" value="{{old('email',$user->email)}}">
                </div>
                <div class="form-group">
                    <label for="password" >Contraseña:</label>
                <input type="password" name="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="password" >Confirma la contraseña:</label>
                <input type="password" name="password_confirmation" class="form-control" >
                </div>
                <button class="btn btn-info btn-block">Actualizar</button>

            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">Roles</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @role('Admin')
                <form method="POST" action="{{ route('admin.roles.update', [$user]) }}" >
                    @method('put')
                    @csrf
                    @include('admin.roles.checkboxes')
                    <button class="btn btn-info btn-block">Actualizar</button>
                </form>
            @else
                <ul class="list-group">
                    @forelse ($user->roles as $role)
                        <li class="list-group-item">{{$role->name}}</li>
                    @empty
                        <li class="list-group-item">No tienes Roles Asignados</li>
                    @endforelse

                </ul>
            @endrole
          </div>
        </div>
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">Permisos</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @role('Admin')

                <form action="{{ route('admin.permission.update', [$user]) }}           "                      method="POST">
                    @method('put')
                    @csrf

                   @include('admin.permissions.checkboxes',['model'=>$user])

                    <button class="btn btn-info btn-block">Actualizar</button>
                </form>
            @else
                <ul class="list-group">
                    @forelse ($user->permissions as $permission)
                        <li class="list-group-item">{{$permission->name}}</li>
                    @empty
                        <li class="list-group-item">No tienes Permisos Asignados</li>
                    @endforelse
                </ul>
            @endrole
          </div>
        </div>
    </div>


  </div>

@endsection
