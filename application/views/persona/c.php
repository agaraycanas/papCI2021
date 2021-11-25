<div class="container">
	<form action="<?=base_url()?>persona/cPost" method="post">
		
		<h1>Nueva persona</h1>
		
		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre"/>
		<br/>
		
		País de nacimiento
		<select name="idPaisNace">
			<?php foreach ($paises as $pais):?>
			<option value="<?=$pais->id ?>">
				<?=$pais->nombre?>
			</option>
			<?php endforeach;?>
		</select>
		<br/>
		
		<fieldset>
    		<legend>
	    		Aficiones que le gustan
    		</legend>
    		
    		<?php foreach ($aficiones as $aficion): ?>
    			<input id ="idg-<?=$aficion->id?>" type="checkbox" value="<?=$aficion->id?>" name="idAficionGusta[]"/>
    			<label for="idg-<?=$aficion->id?>" ><?=$aficion->nombre?></label>
			    		
    		<?php endforeach;?>
    		
		</fieldset>
		
		<input type="submit"/>
		<br/>
	</form>
</div>