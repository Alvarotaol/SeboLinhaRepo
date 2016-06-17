@extends('layout')

@section('content')

@foreach ($denuncias as $denuncia)
	<div class="row">
		<div class="span6">
		<blockquote>
			{{$denuncia->reclamacao}}
			 <small>por <a href="/usuario/{{$denuncia->idDenunciante}}">{{$denuncia->nome}}</a> para <a href="/usuario/{{$denuncia->idDenunciado}}">{{$denuncia->dnome}}</a></small>
		</blockquote>
		</div>
	</div>

@endforeach

@stop