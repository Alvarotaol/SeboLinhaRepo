@extends('layout')

@section('content')

<h2>{{$pagename}}</h2>

@foreach ($livros as $livro)
<div class="col-sm-3">
	<h4>{{$livro->titulo}}</h4>
	<div>Por <i>{{$livro->autor}}</i></div>
	<div>Idioma: {{$livro->idioma}}</div>
	<div>ISBN: {{$livro->isbn}}</div>
</div>
@endforeach

@stop