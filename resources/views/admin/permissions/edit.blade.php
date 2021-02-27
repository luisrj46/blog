
@extends('admin.layouts.layout')

@section('headerr')
    @include('admin.layouts.partials.starterPage',$pages=[
    ['name'=>'Listar permission','route'=>'admin.permissions.index'],
    ['name'=>'Editar permission','route'=>'admin.permissions.edit'],
    ])
@endsection
@section('contentt')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Editar Permisos</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
     <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Actualizar permission</h3>

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
                  <form method="POST" action="{{ route('admin.permissions.update',$permission) }}" >
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name" >Identificador:</label>
                    <input disabled type="text"  class="form-control" value="{{$permission->name}}">
                    </div>
                    <div class="form-group">
                        <label for="display_name" >Nombre:</label>
                    <input type="text" name="display_name" class="form-control" value="{{old('display_name',$permission->display_name)}}">
                    </div>

                      <button class="btn btn-info btn-block">Actualizar permission</button>

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



