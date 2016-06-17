<ul class="list-group">
	@if(Auth::user())
	<li class="list-group-item">
		<a href="/anuncio/new">Novo Anúncio</a>
	</li>
	<li class="list-group-item">
		<a href="/anuncio/meus">Meus Anúncios</a>
	</li>
	@endif
</ul>