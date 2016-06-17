@extends('layout')
@section('content')

<script type="text/javascript">
	function ocultarForm() {
		var divid = 'opbuscaid'
		var div = document.getElementById(divid);
		var disp = div.style.display;
		div.style.display = disp == 'none' ? 'block' : 'none';
	}
</script>

<div class="row" id="opbuscaid" style="display: none;">
	<div class = "col-md-6">
		<form action="/buscar" class="col-sm-12" style="align-items: center; min-height: 34px;">
			<div class="panel panel-default">
				<div class="panel-heading">Pesquisa avançada</div>
				<div class="form-group">
					<label for="titulo" class="col-md-3 control-label">Títulos:</label>
					<div class="col-md-8">
						<input type="text" name="titulo" placeholder="Título" value="{{$termosbusca->titulo}}">
					</div>
				</div>
				<div class="form-group">
					<label for="autor" class="col-md-3 control-label">Autor:</label>
					<div class="col-md-8">
						<input type="text" name="autor" placeholder="Autor" value="{{$termosbusca->autor}}">
					</div>
				</div>
				<div class="form-group">
					<label for="idioma" class="col-md-3 control-label">Idioma:</label>
					<div class="col-md-8">
						<input type="text" name="idioma" placeholder="Idioma" value="{{$termosbusca->idioma}}">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-secondary">Pesquisar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<button type="button" class="btn btn-secondary" onclick="ocultarForm()">Opções avançadas de busca</button>

<div id='aviso'>
	@if(count($resultados) == 0)
	Nenhum resultado. Tente usar menos parâmetros de busca
	@endif
</div>

@foreach ($resultados as $resultado)
<div class="panel">
	<div class="col-sm-3">
		<img src="http://placehold.it/125x150">
		<h4><a href="/livro/{{$resultado->id}}">{{$resultado->titulo}}</a></h4>
		<div>Por <i>{{$resultado->autor}}</i></div>
		<div>Idioma: {{$resultado->idioma}}</div>
		<div>ISBN: {{$resultado->isbn}}</div>
	</div>
</div>
@endforeach

@stop
