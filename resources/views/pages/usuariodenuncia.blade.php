@extends('layout')

@section('content')

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

<h2>Deseja realmente denunciar este usuário?</h2>

<form action="/usuario/{{ $usuario }}/denunciar" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Criar denúncia</div>
				<div class="form-group">
					<label for="motivo" class="col-md-3 control-label">Motivo:</label>
					<div class="col-md-8">
						<textarea name="motivo" id="motivo" class="form-control"></textarea>
						@if ($errors->has('motivo'))
							<span class="help-block">
								<strong>{{ $errors->first('motivo') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-3">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@stop