@extends('layout')

@section('content')

<h2>Categorias</h2>
<div class = "row">
@foreach ($categorias as $categoria)
<div class="col-sm-3">
	<h4><a href="/categorias/{{$categoria->id}}">{{$categoria->nome}}</a>
	@if(Auth::user())
	<form action="/categorias/{{$categoria->id}}/delete" method="POST" class="form-horizontal" style="display: inline;">
		{!! csrf_field() !!}
		{{ method_field('DELETE') }}
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	</form>
	@endif
	</h4>
</div>
@endforeach
</div>
@if(Auth::user())
<hr>
<h3>Criar uma nova categoria</h3>
<form action="/categoria/new" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-sm-3">
			Nome da Categoria
			<input type="text" name="nome" id="categoria-name" class="form-control">
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>
</form>
@endif

@stop