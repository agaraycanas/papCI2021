<div class="container">
	<h1>Lista de países</h1>
	
	<form action="<?=base_url()?>pais/c">
		<input type="submit" value="Nuevo país"/>
	</form>
	
	<table>
		<tr>
			<th>Nombre</th>
			<th>Acciones</th>
		</tr>
		
		<?php foreach ($paises as $pais):?>
		
		<tr>
			<td>
				<?=$pais->nombre?>
			</td>
			<td>
				<form id="idForm" action="<?=base_url().'pais/u'?>" >
					<input type="hidden" name="idPais" value="<?=$pais->id?>" />
					<button onclick="document.getElementById('idForm').submit()"> 
						<img height=15 width="15" src="<?=base_url().'assets/img/lapiz.png'?>">
					</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>

</div>