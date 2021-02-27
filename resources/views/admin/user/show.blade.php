
@extends('admin.layouts.layout')

@section('headerr')
    @include('admin.layouts.partials.starterPage',$pages=[
    ['name'=>'Listar Usuarios','route'=>'admin.user.index'],
    ['name'=>'Crear Usuarios','route'=>'admin.user.create'],
    ])
@endsection
@section('contentt')
 <div class="row">
     <div class="col-md-3"><div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"
          src="{{ asset('admin/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
          </div>

        <h3 class="profile-username text-center">{{$user->name }}</h3>

          <p class="text-muted text-center">{{$user->getRoleNames()->implode(', ') }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>email</b> <a class="float-right">{{$user->email}}</a>
            </li>
            <li class="list-group-item">
              <b>Publicaciones</b> <a class="float-right">{{$user->post->count()}}</a>
            </li>
            @if ($user->roles->count())
            <li class="list-group-item">
                <b>Roles</b> <a class="float-right">{{$user->getRoleNames()->implode(', ') }}</a>
              </li>
            @endif

          </ul>

          <a href="{{ route('admin.user.edit', [$user]) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>
        <!-- /.card-body -->
      </div>
     </div>
     <div class="col-md-3">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Publicaciones</h3>
            </div>
            <div class="card-body">
                @forelse ($user->post as $post)
                <a href="{{ route('post.ver', [$post]) }}" target="_blank" rel="noopener noreferrer">
                    <strong>{{$post->title}}</strong>
                </a>
                    <br>
                    <small class="text-muted">{{$post->published_at->format('d/M/Y')}}</small>
                    <p class="text-muted">{{$post->excerpt}}</p>
                    @unless ($loop->last)
                        <hr>
                    @endunless
                @empty
                <small class="text-muted">
                    No tiene Post Publicados
                </small>
                @endforelse

            </div>
        </div>

    </div>

        <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Roles</h3>
                </div>
                <div class="card-body">

                    @forelse ($user->roles as $role)
                        <strong>{{$role->name}}</strong>
                        @if ($role->permissions->count())
                        <br>
                            <small class="text-muted">
                            Permisos: {{$role->permissions->pluck('name')->implode(', ')}}</small>
                        @endif
                        @unless ($loop->last)
                            <hr>
                        @endunless

                    @empty
                    <small class="text-muted">
                        No tiene Roles Asignados
                    </small>
                    @endforelse

                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Permisos Extras</h3>
                </div>
                <div class="card-body">
                    @forelse ($user->permissions as $permission)
                        <strong>{{$permission->name}}</strong>
                        <br>
                        @unless ($loop->last)
                            <hr>
                        @endunless

                    @empty
                    <small class="text-muted">
                        No tiene Permisos Extras
                    </small>

                    @endforelse

                </div>
            </div>
        </div>
@endsection
