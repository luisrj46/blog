@extends('layouts.header')
@section('content')
<section class="pages container">
    <div class="page page-about">
        <h1 class="text-capitalize">Pagina no encontrada</h1>
        <p> <a href="{{ url()->previous() }}">Regresar</a></p>
    </div>
</section>
@endsection
