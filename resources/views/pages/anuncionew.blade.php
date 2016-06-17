@extends('layout')

@section('content')

<form action="/anuncio/new" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-sm-3">
			<!--
				dropdown pra tipo {venda, compra, empréstimo}
				textobox para preço
				dropdown com todos os livros
			-->
			Tipo
			<select name="tipo" id="anuncio-tipo" class="form-control">
				@foreach($tipos as $tipo)
					<option value="{{$tipo->id}}">{{$tipo->nome}}</option>
				@endforeach
			</select>
			Preço
			<input type="text" name="preco" id="anuncio-preco" class="form-control">
			Livro
			<select name="livro" id="anuncio-livro" class="form-control">
				<option value=""></option>
				@foreach($livros as $livro)
					<option value="{{$livro->id}}">{{$livro->titulo}}</option>
				@endforeach
			</select>
			@if ($errors->has('livro'))
				<b>Escolha um livro.</b><br>
			@endif

			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>
</form>

@stop