

@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-3">
		<h2><a href="/livro/{{$livro->id}}">{{$livro->titulo}}</a></h2>
		<div>Por <i>{{$livro->autor}}</i></div>
		<div>Idioma: {{$livro->idioma}}</div>
		<div>ISBN: {{$livro->isbn}}</div>
	</div>
</div>
<hr>
<div>
	@if (count($revisoes) > 0)
		@foreach ($revisoes as $revisao)
		<div class="row">
			<div class="col-sm-9">
				<div class="panel panel-default">
				<div class="panel-heading"><b>{{ $revisao->nome }}</b></div>
					<div style="margin-top: 1em; margin-bottom: 1em; margin-left: 1em; margin-right: 1em;">{{ $revisao->texto }}</div>
					<div class="panel-footer clearfix">
						<div class="pull-right">
							{{ $revisao->data }}
						</div>
					</div>
				</div>
				
			</div>
		</div>
		@endforeach
	@else
		<h4> Este livro atualmente não tem revisões. </h4>
	@endif
</div>
<hr>
@if(Auth::user())
<div class="row">
<form action="/revisoes/new" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Adicionar uma nova revisão</div>
				<div class="form-group">
					<label for="texto" class="col-md-2 control-label">Comentário</label>
					<div class="col-md-9">
						<textarea name="texto" id="texto" class="form-control"></textarea>
					</div>
				</div>
				<input type="hidden" name="idUsuario" id="idUsuario" value="{{ Auth::user()->id }}">
				<input type="hidden" name="idLivro" id="idUsuario" value="{{ $livro->id }}">
				<div class="form-group">
					<div class="col-md-9 col-md-offset-2">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
@endif
@stop
