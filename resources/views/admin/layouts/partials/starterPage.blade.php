{{-- @dd($pages); --}}

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Starter Page</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
          @foreach ($pages as $page)
            @if (!$loop->last)
                <li class="breadcrumb-item"><a href="{{ route($page['route']) }}">{{$page['name']}}</a></li>
            @endif

            @if ($loop->last)
                <li class="breadcrumb-item active">{{$page['name']}}</li>
            @endif
          @endforeach
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
