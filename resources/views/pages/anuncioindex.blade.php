@extends('layout')
@section('content')


@foreach ($anuncios as $anuncio)
<div class="panel">
	<div class="panel-heading" style="background:#{{ $cores[$anuncio->tipo] }}">
		<h4 class="panel-title">{{ $anuncio->titulo }}
		@if ($anuncio->tipo === 0)
		<span style="font-size: 12px">(venda)</span>
		@endif
		@if ($anuncio->tipo === 1)
		<span style="font-size: 12px">(compra)</span>
		@endif
		@if ($anuncio->tipo === 2)
		<span style="font-size: 12px">(empréstimo)</span>
		@endif

		</h4>

	</div>
	<div class="panel-body">
		<h4>Por: R$ {{ $anuncio->preco }}</h4>
		<i>Oferecido por {{ $anuncio->nome }}</i>
	</div>
</div>
@endforeach

@stop