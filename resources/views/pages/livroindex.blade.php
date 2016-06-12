

@extends('layout')

@section('content')

@foreach ($livros as $livro)
<div class="col-sm-3">
	<h4>{{ $livro->titulo }}</h4>
	<h4>{{ $livro->autor }}</h4>
</div>
@endforeach

@stop
