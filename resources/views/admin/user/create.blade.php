
@extends('admin.layouts.layout')

@section('headerr')
    @include('admin.layouts.partials.starterPage',$pages=[
    ['name'=>'Listar Usuarios','route'=>'admin.user.index'],
    ['name'=>'Crear Usuarios','route'=>'admin.user.create'],
    ])
@endsection
@section('contentt')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Crear Usuario</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
                  @include('admin.layouts.partials.error-messages')
                  <form method="POST" action="{{ route('admin.user.store') }}" >
                      @csrf
                      <div class="form-group">
                          <label for="name" >Nombre:</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}">
                      </div>
                      <div class="form-group">
                          <label for="email" >Email:</label>
                      <input type="text" name="email" class="form-control" value="{{old('email')}}">
                      </div>
                      <div class="row">

                        <div class="form-group col-md-6">
                            <label for="password" >Roles:</label>
                                @include('admin.roles.checkboxes')
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" >Permisos</label>
                            @include('admin.permissions.checkboxes',['model'=>$user])

                        </div>
                      </div>

                      <span class="help-block">La contraseña sera enviada al nuevo usuario via Email</span>
                      <button class="btn btn-info btn-block">Crear Usuario</button>

                  </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
     </div>
    </div>
    <!-- /.card-body -->
  </div>
  @endsection
