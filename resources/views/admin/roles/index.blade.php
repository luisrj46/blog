
@extends('admin.layouts.layout')

@section('headerr')
    @include('admin.layouts.partials.starterPage',$pages=[
    ['name'=>'Listar Roles','route'=>'admin.role.index'],
    ])
@endsection
@section('contentt')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Listado de Roles</h3>
        @can('create', $roles->first())
            <a class="btn btn-primary float-right" href="{{ route('admin.role.create') }}"><i class="fas fa-plus px-1"></i>Crear Usuario</a>
        @endcan

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="table-role" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Permisos</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>{{$role->permissions->pluck('name')->implode(', ')}}</td>

                    <td>
                        @can('update', $role)

                            <a href="{{ route('admin.role.edit', [$role]) }}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                        @endcan
                        @can('delete', $role)

                            @if ($role->id!==1)
                                <form method="POST" action="{{ route('admin.role.destroy', [$role]) }}" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Esta seguro de cancelar el Usuario definitivamente?')" href="#" class="btn btn-xs btn-danger"><i class="fas fa-times"></i></button>

                                </form>
                            @endif
                        @endcan

                    </td>
                </tr>
            @endforeach

        </tbody>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
<link rel="stylesheet" href={{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}>
<link rel="stylesheet" href={{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}>
<link rel="stylesheet" href={{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}>

@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <!-- DataTables  & Plugins -->
<script src={{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}></script>
<script src={{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}></script>
<script src={{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}></script>
<script src={{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}></script>
<script src={{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}></script>
<script src={{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}></script>
<script src={{ asset('admin/plugins/jszip/jszip.min.js')}}></script>
<script src={{ asset('admin/plugins/pdfmake/pdfmake.min.js')}}></script>
<script src={{ asset('admin/plugins/pdfmake/vfs_fonts.js')}}></script>
<script src={{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}></script>
<script src={{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}></script>
<script src={{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}></script>
<script>
    $(function () {
        $("#table-role").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
    maxFilesize: 2 // Tamaño máximo en MB
};

    });
  </script>
@endpush
