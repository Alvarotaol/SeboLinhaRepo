@extends('layout')

@section('content')

<h2>{{$pagename}}</h2>
<div class = "row">
@foreach ($livros as $livro)
<div class="col-sm-3">
	<h4><a href="/livro/{{$livro->id}}">{{$livro->titulo}}</a></h4>
	<div>Por <i>{{$livro->autor}}</i></div>
	<div>Idioma: {{$livro->idioma}}</div>
	<div>ISBN: {{$livro->isbn}}</div>
	<form action="/livro/{{$livro->id}}/delete" method="POST" class="form-horizontal">
		{!! csrf_field() !!}
		{{ method_field('DELETE') }}
		<button type="submit" class="btn btn-primary">Remover</button>
	</form>
</div>
@endforeach
</div>

<form action="/livros/new" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-sm-3">
			Titulo
			<textarea name="titulo" id="livro-name" class="form-control"></textarea>
			ISBN
			<textarea name="isbn" id="livro-isbn" class="form-control"></textarea>
			Idioma
			<textarea name="idioma" id="livro-idioma" class="form-control"></textarea>
			Autor
			<textarea name="autor" id="livro-autor" class="form-control"></textarea>

			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>
</form>

@stop