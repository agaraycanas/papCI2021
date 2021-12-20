<div class="container">
	<h1>Lista de boletos</h1>
	
	<form action="<?=base_url()?>boleto/registrar">
		<input type="submit" value="Nuevo boleto" autofocus="autofocus"/>
	</form>
	
	<table class="table table-striped">
		<tr>
			<th>Número</th>
			<th>Participación</th>
			<th>¿Propio?</th>
			<th>Acciones </th>
		</tr>
		
		<?php foreach ($usuario->ownParticipacionList as $participacion):?>
			<tr>
				<td>
					<?=$participacion->boleto->numero?>
				</td>
				<td>
					<?=$participacion->cantidad?>
				</td>
				<td>
					<?=$participacion->esPropio?'SÍ':'NO'?>
				</td>
				<td class="row">
    				<form id="idFormU" action="<?=base_url().'participacion/compartir'?>" >
    					<input type="hidden" name="idParticipacion" value="<?=$participacion->id?>"/>
    					<button onclick="document.getElementById('idFormU').submit()"> 
    						<img alt="compartir" title="Compartir" height=15 width="15" src="<?=base_url().'assets/img/compartir.png'?>">
    					</button>
    				</form>
    			</td>
			</tr>
		<?php endforeach;?>
	</table>

</div>