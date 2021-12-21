<div class="container">
	<h1>Compartir participación</h1>
	
	<form action="<?=base_url()?>participacion/compartirPost" method="post">
		<label for="idNumero">Número</label>
		<input id="idNumero" name="numero" type="number" value="<?=$participacion->boleto->numero?>" readonly="readonly"/>
		<br/>

		<label for="idCantidad">Cantidad actual</label>
		<input id="idCantidad" type="number" value="<?=$participacion->cantidad?>" readonly="readonly"/>
		<br/>
		
		<label for="idCantidad">Cantidad a compartir</label>
		<input id="idCantidad" name="cantidad" type="number" value="<?=$participacion->cantidad?>" max="<?=$participacion->cantidad?>"/>
		<br/>
		
		<label for="idUsuario">Compartir con...</label>
		<select name="idUsuario" id="idUsuario" name="idUsuario">
			<?php foreach ($usuarios as $usuario):?>
				<option value="<?=$usuario->id?>">
					<?=$usuario->nombre?>
				</option>
			<?php endforeach;?>
		</select>
		
		<input type="submit"/>
		
	</form>
</div>