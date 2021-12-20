<div class="container">
	<h1>¡¡ ATENCIÓN !!</h1>
	<h3>Esta acción destruirá la base de Datos</h3>
	<h3>Introduce la contraseña para continuar</h3>
	
	<form action="<?=base_url()?>anonymous/initPost" mathos="post">
		Contraseña
		<input type="password" name="pwd"/>
		<br/>
	</form>
</div>