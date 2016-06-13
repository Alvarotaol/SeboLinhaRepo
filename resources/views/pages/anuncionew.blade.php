@extends('layout')

@section('content')

<form action="/anuncio/new/create" method="POST" class="form-horizontal">
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
			<input type="text" name="preco" id="anuncio-preco" class="form-control"></textbox>
			Idioma

			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>
</form>

@stop