<div class="container">
	<form action="<?=base_url()?>pais/uPost" method="post">
		<h1>Editar país</h1>

		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre" value="<?=$pais->nombre?>" />
		<br/>
		
		<input type="hidden" name="idPais" value="<?=$pais->id?>" />
		
		<input type="submit"/>
		
	</form>
</div>