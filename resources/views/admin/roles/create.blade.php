
@extends('admin.layouts.layout')

@section('headerr')
    @include('admin.layouts.partials.starterPage',$pages=[
    ['name'=>'Listar Roles','route'=>'admin.role.index'],
    ['name'=>'Crear Roles','route'=>'admin.role.create'],
    ])
@endsection
@section('contentt')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Crear Role</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
     <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Crear Role</h3>

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
                  <form method="POST" action="{{ route('admin.role.store') }}" >
                      @include('admin.roles.form')


                      <button class="btn btn-info btn-block">Crear Role</button>

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



