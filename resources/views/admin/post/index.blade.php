
@extends('admin.layouts.layout')

@section('headerr')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Starter Page</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Post</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('contentt')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="table-post" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Titulo</th>
          <th>Extracto</th>
          <th>Acciones</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->excerpt}}</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-warning"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fas fa-times"></i></a>
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
<link rel="stylesheet" href={{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}>
<link rel="stylesheet" href={{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}>
<link rel="stylesheet" href={{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}>

@endpush

@push('scripts')
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
      $('#table-post').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush
