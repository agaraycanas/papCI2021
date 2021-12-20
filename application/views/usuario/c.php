
<div class="container">
	<form id="id-form" action="<?=base_url()?>usuario/cPost" method="post">
		
		<h1>Nuevo usuario</h1>
		
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
		
		


		<input type="submit"/>
		<br/>
	</form>
</div>