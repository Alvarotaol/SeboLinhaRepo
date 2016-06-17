@extends('layout')

@section('content')

@if(Auth::user()->id != $usuario->id)
<h3>Oops! Você não pode editar este usuário.</h3>
@else
<div class="flash-message">
	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
		@if(Session::has('alert-' . $msg))
			<p class="alert alert-{{ $msg }}">
			{{ Session::get('alert-' . $msg) }}
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</p>
		@endif
	@endforeach
</div>
<form action="/usuario/{{$usuario->id}}/update" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Suas informações</div>
				<div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
					<label for="nome" class="col-md-3 control-label">Nome</label>
					<div class="col-md-8">
						<input type="text" name="nome" id="nome" class="form-control" value="{{$usuario->nome}}">
						@if ($errors->has('nome'))

						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="col-md-3 control-label">Email</label>
					<div class="col-md-8">
						<input type="text" name="email" id="email" class="form-control" value="{{$usuario->email}}">
						@if ($errors->has('email'))

						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('cpf') ? ' has-error' : '' }}">
					<label for="email" class="col-md-3 control-label">CPF</label>
					<div class="col-md-8">
						<input type="text" name="cpf" id="cpf" class="form-control" value="{{$usuario->cpf}}">
						@if ($errors->has('cpf'))

						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('endereco') ? ' has-error' : '' }}">
					<label for="endereco" class="col-md-3 control-label">Endereço</label>
					<div class="col-md-8">
						<input type="text" name="endereco" id="endereco" class="form-control" value="{{$usuario->endereco}}">
						@if ($errors->has('endereco'))

						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('cidade') ? ' has-error' : '' }}">
					<label for="cidade" class="col-md-3 control-label">Cidade</label>
					<div class="col-md-8">
						<input type="text" name="cidade" id="cidade" class="form-control" value="{{$usuario->cidade}}">
						@if ($errors->has('cidade'))

						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}">
					<label for="estado" class="col-md-3 control-label">Estado</label>
					<div class="col-md-8">
						<input type="text" name="estado" id="estado" class="form-control" value="{{$usuario->estado}}">
						@if ($errors->has('estado'))

						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-3">
						<button type="submit" class="btn btn-primary">Enviar alterações</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>

@endif

@endsection