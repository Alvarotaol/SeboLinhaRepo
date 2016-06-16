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
	<form action="/buscar" class="col-sm-3" style="display: flex; align-items: center; min-height: 34px;">
		Título:
		<input type="text" name="titulo" placeholder="Título" value="{{$termosbusca->titulo}}">
		Autor:
		<input type="text" name="autor" placeholder="Autor" value="{{$termosbusca->autor}}">
		Idioma:
		<input type="text" name="idioma" placeholder="Idioma" value="{{$termosbusca->idioma}}">
		<button type="submit">Pesquisar</button>
	</form>
</div>
<button type="button" onclick="ocultarForm()">Opções avançadas de busca</button>

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
@endforeach

@stop
