<div class="container">
	<h1>Compartir participación</h1>
	
	<form>
		<label for="idNumero">Número</label>
		<input id="idNumero" type="number" value="<?=$participacion->boleto->numero?>" readonly="readonly"/>
		<br/>

		<label for="idCantidad">Cantidad actual</label>
		<input id="idCantidad" type="number" value="<?=$participacion->cantidad?>" readonly="readonly"/>
		<br/>
		
		<label for="idUsuario">Compartir con...</label>
		<select id="idUsuario" name="idUsuario">
			<?php foreach ($usuarios as $usuario):?>
				<option value="<?=$usuario->id?>">
					<?=$usuario->nombre?>
				</option>
			<?php endforeach;?>
		</select>
		
	</form>
</div>