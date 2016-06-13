@extends('layout')

@section('content')

@foreach ($anuncios as $anuncio)
<div class="col-sm-3">
	<h4>{{ $anuncio->titulo }}</h4>
	<h4>R$ {{ $anuncio->preco }}</h4>
</div>
@endforeach

@stop
