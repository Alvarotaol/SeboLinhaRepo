@extends('layout')

@section('content')

@foreach ($categorias as $categoria)
<div class="col-sm-3">
	<h4>{{ $categoria->nome }}</h4>
</div>
@endforeach

@stop