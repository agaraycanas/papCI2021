<div class="container">
<h1>Iniciar sesión</h1>

<form action="<?=base_url()?>persona/loginPost" method="post">
		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre" autofocus="autofocus"/>
		<br/>
		
		<label for="id-pwd">Contraseña</label>
		<input id="id-pwd" type="password" name="password" />
		<br/>
		
		<input type="submit"/>
</form>

</div>