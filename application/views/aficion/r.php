<div class="container">
	<h1>Lista de aficiones</h1>
	
	<form action="<?=base_url()?>aficion/c">
		<input type="submit" value="Nueva afición" autofocus="autofocus"/>
	</form>
	
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th>Acciones</th>
		</tr>
		
		<?php foreach ($aficiones as $aficion):?>
		
		<tr>
			<td>
				<?=$aficion->nombre?>
			</td>
			
			<td class="row">
				
				<form id="idFormU" action="<?=base_url().'aficion/u'?>" >
					<input type="hidden" name="idAficion" value="<?=$aficion->id?>" />
					<button onclick="document.getElementById('idFormU').submit()">
						<img height=15 width="15" src="<?=base_url().'assets/img/lapiz.png'?>">
					</button>
				</form>
				
				<form id="idFormD" action="<?=base_url().'aficion/d'?>" method="get">
					<input type="hidden" name="idAficion" value="<?=$aficion->id?>" />
					<button onclick="document.getElementById('idFormD').submit()">
						<img height=15 width="15" src="<?=base_url().'assets/img/basura.png'?>">
					</button>
				</form>
			</td>
			
		</tr>
		<?php endforeach;?>
	</table>

</div>