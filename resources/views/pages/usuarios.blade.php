@extends('layout')

@section('content')

<h2>Usuários</h2>

@foreach ($usuarios as $usuario)
<div class="row">
	<div class="col-sm-1">
		<img src="http://placehold.it/70x90">
	</div>
	<div class="col-sm-3">
		<h4>{{$usuario->nome}}</h4>
		<div>Contato: <i>{{$usuario->email}}</i></div>
		<div>CPF: {{$usuario->cpf}}</div>
		<div><a href="usuario/{{$usuario->id}}">Mais informações</a></div>
	</div>
</div>
@endforeach

@stop