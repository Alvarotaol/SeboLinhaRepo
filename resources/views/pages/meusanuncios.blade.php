@extends('layout')

@section('content')

@foreach ($anuncios as $anuncio)
<div class="col-sm-3">
	<h4>{{ $anuncio->titulo }}</h4>
	<h4>R$ {{ $anuncio->preco }}</h4>
	<form action="/anuncio/{{$anuncio->id}}/delete" method="POST" class="form-horizontal">
		{!! csrf_field() !!}
		{{ method_field('DELETE') }}
		<button type="submit" class="btn btn-primary">Remover</button>
	</form>
</div>
@endforeach

@stop
