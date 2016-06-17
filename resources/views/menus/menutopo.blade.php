<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">
				Sebo Linha
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/">Início</a></li>
				<li> <a href="/livros">Livros</a></li>
				<li><a href="/usuarios">Usuarios</a></li>
				<li><a href="/categorias">Categorias</a></li>
				<li><a href="/denuncias">Denúncias</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Entrar</a></li>
					<li><a href="{{ url('/register') }}">Cadastro</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li><a href="/editprofile/{{ Auth::user()->id }}"><i class="fa fa-btn fa-sign-out"></i>Alterar suas informações</a></li>
							<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
						</ul>
					</li>
				@endif
			</ul>
			<form action="/buscar" class="nav navbar-form navbar-input-group navbar-right" role="search" style="">
				<input type="text" name="titulo" class="search-query span2" placeholder="Buscar...">
			</form>
		</div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</nav>
