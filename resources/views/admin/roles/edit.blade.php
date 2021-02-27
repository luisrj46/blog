
@extends('admin.layouts.layout')

@section('headerr')
    @include('admin.layouts.partials.starterPage',$pages=[
    ['name'=>'Listar Role','route'=>'admin.role.index'],
    ['name'=>'Editar Role','route'=>'admin.role.edit'],
    ])
@endsection
@section('contentt')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Editar Role</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
     <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Actualizar Role</h3>

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
                  <form method="POST" action="{{ route('admin.role.update',[$role]) }}" >
                    @method('put')
                        @include('admin.roles.form')

                      <button class="btn btn-info btn-block">Actualizar Role</button>

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



