<div class="container">
	<h1>Borrar afición</h1>
	<h5>¿Estás seguro de querer borrar <?=$aficion->nombre?>?</h5>
	
	<form action="<?=base_url()?>aficion/dPost" method="post">
		<input type="hidden" name="idAficion" value="<?=$aficion->id?>" />
		<input type="submit" value="Confirmar"/>
	</form>

	<form action="<?=base_url()?>aficion/r" >
		<input type="submit" value="Cancelar"/>
	</form>
	
</div>