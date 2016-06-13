@extends('layout')
@section('content')


@foreach ($anuncios as $anuncio)
<div class="panel">
	<div class="panel-heading" style="background:#{{ $cores[$anuncio->tipo] }}">
		<h4 class="panel-title">{{ $anuncio->titulo }}</h4>
	</div>
	<div class="panel-body">
		<h4>R$ {{ $anuncio->preco }}</h4>
		<h4>{{ $anuncio->nome }}</h4>
	</div>
</div>
@endforeach

@stop