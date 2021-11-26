<div class="container">
	<form action="<?=base_url()?>pais/uPost" method="post">
		<h1>Editar persona</h1>

		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre" value="<?=$persona->nombre?>" />
		<br/>
		
		<input type="hidden" name="idPersona" value="<?=$persona->id?>" />
		
		<input type="submit"/>
		
	</form>
</div>