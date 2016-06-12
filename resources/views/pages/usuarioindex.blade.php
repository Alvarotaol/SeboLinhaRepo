@extends('layout')

@section('content')

@foreach ($usuarios as $usuario)
<div class="col-sm-3">
	<h4>{{ $usuario->nome }}</h4>
	<h4>{{ $usuario->email }}</h4>
</div>
@endforeach
@stop