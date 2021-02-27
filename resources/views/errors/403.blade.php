@extends('admin.layouts.layout')

@section('contentt')
<h2>Pagina no Autorizada</h2>
<p class="text-danger">{{$exception->getMessage()}}</p>
<p> <a href="{{ url()->previous() }}">Regresar</a></p>

@endsection
