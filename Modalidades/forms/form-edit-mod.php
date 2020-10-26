<form action="../database/modalidades/update.php" method="POST" class="row">
	
	<fieldset class="formulario">
		<legend><img src="../imagem/luta.png" alt="[imagem]" width="100"></legend>
		<h5 class="light center"><strong>Editar Modalidade teste</h5></strong>

		<div class="input-field col s12">
			<input type="hidden" name="id" value="<?php echo $values['id']?>">
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">directions_run</i>
			<input type="text" name="modalidade" id="modalidade" value="<?php echo $values['modalidade']?>" required>
			<label for="modalidade">Digite a Modalidade</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">attach_money</i>
			<input type="text" name="mensalidade" id="mensalidade" value="<?php echo $values['mensalidade']?>" required>
			<label for="mensalidade">Digite a Mensalidade</label>
		</div>

		<div class="input-field col s12">
			<input type="submit" name="Alterar" class="btn">
			<a href="modalidades.php" class="btn">Cancelar</a>
		</div>
	</fieldset>

</form>