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
<hr>
<form action="/livros/new" method="POST" class="form-horizontal">
	{!! csrf_field() !!}
	<div class = "row">
		<div class = "col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Adicionar um novo livro</div>
				<div class="form-group">
					<label for="titulo" class="col-md-3 control-label">Titulo</label>
					<div class="col-md-8">
						<input type="text" name="titulo" id="titulo" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="isbn" class="col-md-3 control-label">ISBN</label>
					<div class="col-md-8">
						<input type="text" name="isbn" id="isbn" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="idioma" class="col-md-3 control-label">Idioma</label>
					<div class="col-md-8">
						<input type="text" name="idioma" id="idioma" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="autor" class="col-md-3 control-label">Autor</label>
					<div class="col-md-8">
						<input type="text" name="autor" id="autor" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="categoria" class="col-md-3 control-label">Categoria</label>
					<div class="col-md-8">
					<select name="categoria" id="categoria-livro" class="form-control">
						<option value=""></option>
						@foreach($categorias as $categoria)
							<option value="{{$categoria->id}}">{{$categoria->nome}}</option>
						@endforeach
					</select>
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