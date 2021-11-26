<div class="container">
	<h1>Borrar persona</h1>
	<h5>¿Estás seguro de querer borrar a <?=$persona->nombre?>?</h5>
	
	<form action="<?=base_url()?>persona/dPost" method="post">
		<input type="hidden" name="idPersona" value="<?=$persona->id?>" />
		<input type="submit" value="Confirmar"/>
	</form>

	<form action="<?=base_url()?>persona/r" >
		<input type="submit" value="Cancelar"/>
	</form>
	
</div>