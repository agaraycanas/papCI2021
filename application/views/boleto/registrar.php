<div class="container">
	<h1>Registrar boleto propio</h1>
	
	<form action="<?=base_url()?>boleto/registrarPost" method="post">
		<label for="id-num">Número</label>
		<input id="id-num" type="number" max="99999" min="00000" name="numero"/>
		<br/>

		<label for="id-cant">Participación</label>
		<input id="id-cant" type="number" min="1" value="20" name="cantidad"/>
		<br/>
		
		<input type="submit"/>
	</form>
</div>