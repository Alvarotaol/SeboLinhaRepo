@extends('layout')
@section('content')


@foreach ($resultados as $resultado)
	<div class="panel">
		<div class="col-sm-3">
		<img src="http://placehold.it/125x150">
		<h4><a href="/livro/{{$resultado->id}}">{{$resultado->titulo}}</a></h4>
		<div>Por <i>{{$resultado->autor}}</i></div>
		<div>Idioma: {{$resultado->idioma}}</div>
		<div>ISBN: {{$resultado->isbn}}</div>
	</div>
@endforeach

@stop