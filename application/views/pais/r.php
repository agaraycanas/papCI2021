<div class="container">
	<h1>Lista de países</h1>
	
	<form action="<?=base_url()?>pais/c">
		<input type="submit" value="Nuevo país"/>
	</form>
	
	<table>
		<tr>
			<th>Nombre</th>
		</tr>
		
		<?php foreach ($paises as $pais):?>
		
		<tr>
			<td>
				<?=$pais->nombre?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>

</div>