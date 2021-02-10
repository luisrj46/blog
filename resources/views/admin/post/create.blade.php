<div class="modal fade" id="modal-crear-post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar Titulo Publicacion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.post.store','#create') }}">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"  name="title" id="exampleInputEmail1" placeholder="Enter title">
                @error('title')
                <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('scripts')
<script>
    if (window.location.hash === '#create') {
        $('#modal-crear-post').modal('show');
    }

    $('#modal-crear-post').on('hide.bs.modal',function(){
        window.location.hash='#';
        // console.log('el modal se ha cerrado');
    });
    $('#modal-crear-post').on('shown.bs.modal',function(){
        $('#title').focus();
        window.location.hash='#create';
        // console.log('el modal se ha cerrado');
    });

</script>

@endpush
<!-- /.modal -->

{{--
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
          <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Listar Post</a></li>
          <li class="breadcrumb-item active">Crear Post</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('contentt')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">

      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST"  action="{{ route('admin.post.store') }}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titulo Publicacion</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"  name="title" id="exampleInputEmail1" placeholder="Enter title">
                        @error('title')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputPassword1">Contenido Publicacion</label>
                        <textarea  class="form-control @error('body') is-invalid @enderror" name="body" id="summernote"  rows="10">{{ old('body') }}</textarea>
                        @error('body')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                    </div>
                </div>
                <div class="col-md-4">

                  <div class="form-group ">
                    <label>Fecha Publicación</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" value="{{ old('published_at') }}" name="published_at" class="form-control datetimepicker-input @error('published_at') is-invalid @enderror" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        @error('published_at')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <label>Categorias </label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="categorias">
                        <option value="" selected disabled>Seleccione Una Categoria</option>
                        @foreach ($categorias as $cat)
                    <option value="{{$cat->id}}"
                        {{old('category_id')== $cat->id ? 'selected':''}}
                        >{{$cat->name}}</option>

                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                    </div>

                    <div class="form-group">
                    <label>Etiquetas</label>
                        <select class="form-control select2 @error('tags') is-invalid @enderror" name="tags[]"  multiple="multiple" data-placeholder="Seleccione una Etiqueta o mas Etiqueta" style="width: 100%;">
                            @foreach ($etiquetas as $etique)
                             <option value="{{$etique->id}}" {{collect(old('tags'))->contains($etique->id) ? 'selected':''}} >{{$etique->name}}</option>
                            @endforeach

                        </select>
                        @error('tags')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Extracto Publicacion</label>
                            <textarea name="excerpt" id="" class="form-control @error('excerpt') is-invalid @enderror"  rows="2">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                            <span class="error invalid-feedback">{{ $message }}</span>
                              @enderror
                    </div>
                <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>

                </div>

            </div>



        </form>

        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->


  </div>
  @endsection
  @push('styles')
    <!-- summernote -->
    <link rel="stylesheet" href={{asset('admin/plugins/summernote/summernote-bs4.min.css')}}>
    <link rel="stylesheet" href={{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}>
     <!-- Select2 -->
  <link rel="stylesheet" href={{ asset('admin/plugins/select2/css/select2.min.css')}}>
  <link rel="stylesheet" href={{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}>

  @endpush
  @push('scripts')
  <!-- Select2 -->
<script src={{ asset('admin/plugins/select2/js/select2.full.min.js')}}></script>

 <!-- Summernote -->
<script src={{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset('admin/plugins/moment/moment.min.js')}}></script>
<script src={{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}></script>

<!-- date-range-picker -->
<script src={{ asset('admin/plugins/moment/moment.min.js')}}></script>
<script src={{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}></script>

<!-- bootstrap color picker -->
    <script>
         //Initialize Select2 Elements
    $('.select2').select2()
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('#summernote').summernote()
      </script>
  @endpush
 --}}

