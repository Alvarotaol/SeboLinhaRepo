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

@stop