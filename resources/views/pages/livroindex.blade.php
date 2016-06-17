

@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-3">
		<img src="http://placehold.it/200x300">
	</div>
	<div class="col-sm-6">
		<h2><a href="/livro/{{$livro->id}}">{{$livro->titulo}}</a></h2>
		<div>Por <i>{{$livro->autor}}</i></div>
		<div style="margin-top: 2em"> {{$livro->sumario}}</div>
		<h4>Detalhes sobre este livro</h4>
		<div><b>Idioma:</b> {{$livro->idioma}}</div>
		<div><b>ISBN:</b> {{$livro->isbn}}</div>
		<div><b>Lançamento:</b> {{$livro->lancamento}}</div>
		<div><b>Categorias</b>:
		@foreach ($categorias as $categoria)
			{{$categoria->nome}}; 
		@endforeach
	</div>
	<div class="col-sm-3">
	<h4>Anúncios</h4>
	</div>
</div>
<hr>
<div>
<div class="well">
	@if (count($revisoes) > 0)
		@foreach ($revisoes as $revisao)
		<div class="row">
			<div class="col-sm-12">
				<img style="" src="http://placehold.it/50x50">
				<b>{{ $revisao->nome }}</b>
				<span style="font-size: 9px">{{ $revisao->data }}</span>

				<span style="float:right;">
					<form action="/revisao/{{ $revisao->id }}/avaliar" method="POST" class="form-horizontal">
					{!! csrf_field() !!}
						@if(Auth::user())
						<button type="submit" name="nota" id="nota" value ="0" class="btn btn-danger glyphicon glyphicon-thumbs-down"></button>
						@endif
						Revisão ajudou: <span id="stars" class="starrr" data-rating='{{ $revisao->media }}'></span>
						<span id="count"></span>
						@if(Auth::user())
						<button type="submit" name="nota" id="nota" value ="1" class="btn btn-success glyphicon glyphicon-thumbs-up"></button>
						@endif
					</form>
				</span>
				
				
				<div style="margin-top: 1em; margin-bottom: 1em; margin-left: 1em; margin-right: 1em;">{{ $revisao->texto }}</div>
			</div>
		</div>
		<hr>
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
