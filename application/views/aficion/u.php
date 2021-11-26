<div class="container">
	<form action="<?=base_url()?>aficion/uPost" method="post">
		<h1>Editar afición</h1>

		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre" value="<?=$aficion->nombre?>" />
		<br/>
		
		<input type="hidden" name="idAficion" value="<?=$aficion->id?>" />
		
		<input type="submit"/>
		
	</form>
</div>