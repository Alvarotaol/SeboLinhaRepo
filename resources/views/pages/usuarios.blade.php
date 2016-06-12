@extends('layout')

@section('content')

<h2>{{$pagename}}</h2>

@foreach ($usuarios as $usuario)
<div class="col-sm-3">
	<h4>{{$usuario->nome}}</h4>
	<div>Por <i>{{$usuario->email}}</i></div>
	<div>Idioma: {{$usuario->cpf}}</div>
	<div>link: <a href="usuario/{{$usuario->id}}">Link</a> </div>
</div>
@endforeach

@stop