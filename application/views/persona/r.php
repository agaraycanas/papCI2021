<div class="container">
	<h1>Lista de personas</h1>
	
	<form action="<?=base_url()?>persona/c">
		<input type="submit" value="Nueva persona" autofocus="autofocus"/>
	</form>
	
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th>País nacimiento</th>
			<th>País residencia</th>
			<th>Aficiones (gustan)</th>
			<th>Aficiones (odia)</th>
			<th>Acciones</th>
		</tr>
		
		<?php foreach ($personas as $persona):?>
			<tr>
			
				<td>
					<?=$persona->nombre?>
				</td>
				
				<td>
					<?=($persona->nace_id) != null ? $persona->fetchAs('pais')->nace->nombre : '' ?>
				</td>
				
				<td>
					<?=($persona->vive_id) != null ? $persona->fetchAs('pais')->vive->nombre : '' ?>
				</td>
				
				<td>
					<?php foreach ($persona->ownGustoList as $gusto):?>
						<?=$gusto->aficion_id!=NULL ? $gusto->aficion->nombre : ''?> 
					<?php endforeach;?>
				</td>
				
				<td>
					<?php foreach ($persona->ownOdioList as $odio):?>
						<?=$odio->aficion_id!=NULL ? $odio->aficion->nombre : ''?> 
					<?php endforeach;?>
				</td>
				
				<td class="row">
    				<form id="idFormU" action="<?=base_url().'persona/u'?>" >
    					<input type="hidden" name="idPersona" value="<?=$persona->id?>" />
    					<button onclick="document.getElementById('idFormU').submit()"> 
    						<img height=15 width="15" src="<?=base_url().'assets/img/lapiz.png'?>">
    					</button>
    				</form>
    				
    				<form id="idFormD" action="<?=base_url().'persona/d'?>" >
    					<input type="hidden" name="idPersona" value="<?=$persona->id?>" />
    					<button onclick="document.getElementById('idFormD').submit()"> 
    						<img height=15 width="15" src="<?=base_url().'assets/img/basura.png'?>">
    					</button>
    				</form>
				</td>
			</tr>
		<?php endforeach;?>
	</table>

</div>