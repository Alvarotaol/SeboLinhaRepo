@extends('layout')

@section('content')

<h2>{{$pagename}}</h2>
<div class = "row">
@foreach ($categorias as $categoria)
<div class="col-sm-3">
	<h4><a href="/categorias/{{$categoria->id}}">{{$categoria->nome}}</a></h4>
	<form action="/categorias/{{$categoria->id}}/delete" method="POST" class="form-horizontal">
		{!! csrf_field() !!}
		{{ method_field('DELETE') }}
		<button type="submit" class="btn btn-primary">Remover</button>
	</form>
</div>
@endforeach
</div>

<form action="/categoria/new" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-sm-3">
			Nome da Categoria
			<textarea name="nome" id="categoria-name" class="form-control"></textarea>

			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>
</form>

@stop