@extends('layout')

@section('content')

<h2>{{$pagename}}</h2>

@foreach ($livros as $livro)
<div class="col-sm-3">
	<h4>{{$livro->titulo}}</h4>
	<div>Por <i>{{$livro->autor}}</i></div>
	<div>Idioma: {{$livro->idioma}}</div>
	<div>ISBN: {{$livro->isbn}}</div>
	<div><a href="/livro/{{$livro->id}}">Link</a> </div>
</div>
@endforeach

<form action="/livros/new" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<textarea name="titulo" id="livro-name" class="form-control"></textarea>
	<textarea name="isbn" id="livro-isbn" class="form-control"></textarea>
	<textarea name="idioma" id="livro-idioma" class="form-control"></textarea>
	<textarea name="autor" id="livro-autor" class="form-control"></textarea>

	<button type="submit" class="btn btn-primary">Enviar</button>
</form>

@stop