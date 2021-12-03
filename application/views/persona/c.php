
<div class="container">
	<form id="id-form" action="<?=base_url()?>persona/cPost" method="post">
		
		<h1>Nueva persona</h1>
		
		<label for="id-nombre">Nombre</label>
		<input id="id-nombre" type="text" name="nombre" autofocus="autofocus"/>
		<br/>
		
		<label for="id-pwd">Contraseña</label>
		<input id="id-pwd" type="password" name="password" />
		<br/>
		
		<script>
    		 $(window).on("load",(function(){
    		 $(function() {
    		 $('#id-foto').change(function(e) {addImage(e);});
    		 function addImage(e){
    			var file = e.target.files[0],
    			imageType = /image.*/;
    			if (!file.type.match(imageType)) return;
    			var reader = new FileReader();
    			reader.onload = fileOnload;
    			reader.readAsDataURL(file);
    		}
    		function fileOnload(e) {
    		var result=e.target.result;
    		$('#id-out-foto').attr("src",result);
    		}});}));
		</script>

		<label for="id-foto">Foto de perfil</label>
		<input id="id-foto" type="file" name="foto" />
		<img class="offset-1 col-2" id="id-out-foto" 
			width="3%" height="3%" 
			src="<?=base_url().'assets/img/fotos/foto-0.png'?>" 
			alt=""/>
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
		

		País de residencia
		<select name="idPaisVive">
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
		
		<fieldset>
    		<legend>
	    		Aficiones que odia
    		</legend>
    		
    		<?php foreach ($aficiones as $aficion): ?>
    			<input id ="ido-<?=$aficion->id?>" type="checkbox" value="<?=$aficion->id?>" name="idAficionOdia[]"/>
    			<label for="ido-<?=$aficion->id?>" ><?=$aficion->nombre?></label>
			    		
    		<?php endforeach;?>
    		
		</fieldset>


		<input type="submit"/>
		<br/>
	</form>
</div>