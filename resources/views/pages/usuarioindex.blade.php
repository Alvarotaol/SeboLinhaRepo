@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-2">
		<img src="http://placehold.it/150x200">
	</div>
	<div class="col-sm-9">
		<h4>{{ $usuario->nome }}</h4>
		<b>email:</b> {{ $usuario->email }}
		<div class="row">
			<div class="col-md-6">
			@if(Auth::user() and $usuario->id != Auth::user()->id)
				<form action="/usuario/{{ $usuario->id }}/denuncia" method="GET" class="form-horizontal">
					<div class="form-group">
						<button type="submit" style="margin-left:2em; margin-top:5em" class="btn btn-primary">Denunciar este usuário</button>
					</div>
				</form>
			@endif
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h4>Anúncios criados por {{ $usuario->nome }}</h4>
		@foreach ($anuncios as $anuncio)
			<div class="col-sm-4">
				<div class="panel">
					<div class="panel-heading" style="background:#{{ $cores[$anuncio->tipo] }}">{{ $anuncio->titulo }}</div>
					<div class="panel-body">
						<h4>R$ {{ $anuncio->preco }}</h4>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>

@stop