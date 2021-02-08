
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
    @if ($post->photos->count())
    <div class="card card-outline card-primary">
        <div class="card-header">Fotos cargadas</div>
        <div class="card-body">
            <div class="row">
                @foreach ($post->photos as $photo)
                    <div class="col-md-2">
                        <form method="POST" action="{{ route('admin.photo.destroy', [$photo]) }}">
                            @csrf @method('delete')
                            <button style="position: absolute" class="btn btn-danger btn-xs"><i class="fas fa-home"></i></button>
                            <img src="{{url($photo->url)}}" alt="" class="img-fluid mb-2">
                    </form>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- general form elements -->
    <div class="card card-primary">

      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('admin.post.update',[$post]) }}">
        @csrf
        @method('put')
        <div class="card-body">

            <div class="row">


                <div class="col-md-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titulo Publicacion</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$post->title) }}"  name="title" id="exampleInputEmail1" placeholder="Enter title">
                        @error('title')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputPassword1">Contenido Publicacion</label>
                        <textarea  class="form-control @error('body') is-invalid @enderror" name="body" id="summernote"  rows="10">{{ old('body',$post->body) }}</textarea>
                        @error('body')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                    </div>


                </div>
                <div class="col-md-4">

                  <div class="form-group ">
                    <label>Fecha Publicación</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" value="{{ old('published_at',$post->published_at ? $post->published_at->format('d/m/Y'):null) }}" name="published_at" class="form-control datetimepicker-input @error('published_at') is-invalid @enderror" data-target="#reservationdate"/>
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
                        {{old('category_id',$post->category_id)== $cat->id ? 'selected':''}}
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
                             <option value="{{$etique->id}}" {{collect(old('tags',$post->tags->pluck('id')))->contains($etique->id) ? 'selected':''}} >{{$etique->name}}</option>
                            @endforeach

                        </select>
                        @error('tags')
                        <span class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Extracto Publicacion</label>
                            <textarea name="excerpt" id="" class="form-control @error('excerpt') is-invalid @enderror"  rows="2">{{ old('excerpt',$post->excerpt) }}</textarea>
                            @error('excerpt')
                            <span class="error invalid-feedback">{{ $message }}</span>
                              @enderror
                    </div>

                <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                       <div
                           class="dropzone"
                           id="my-awesome-dropzone"></div>
                       {{-- <div class="dropzone"></div> --}}
                   </div>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css">
    <link rel="stylesheet" href={{asset('admin/plugins/summernote/summernote-bs4.min.css')}}>
    <link rel="stylesheet" href={{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}>
     <!-- Select2 -->
  <link rel="stylesheet" href={{ asset('admin/plugins/select2/css/select2.min.css')}}>
  <link rel="stylesheet" href={{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}>

  @endpush
  @push('scripts')
  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
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
        $('#summernote').summernote({
            placeholder:"escribe aqui el body",
            height:"200"

        })
        // "myAwesomeDropzone" is the camelized version of the HTML element's ID
       var myDropzone =new Dropzone('.dropzone',{
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        // acceptedFiles:"image/*",
        paramName:"photo",
        headers:{
            "X-CSRF-TOKEN":'{{csrf_token()}}'
        },

        url:"{{ route('admin.post.photos.store', [$post]) }}",
        dictDefaultMessage:"Carga tus Imagenes",
        accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
            done("Naha, you don't.");
            }
            else { done(); }
        }
        });
        // / Disabling autoDiscover, otherwise Dropzone will try to attach twice.
Dropzone.autoDiscover = false;

        myDropzone.on('error', function(file,resp){
            let mensaje=resp.errors['photo'];
            $('.dz-error-message:last > span').text(mensaje)
        })

//       </script>
  @endpush

