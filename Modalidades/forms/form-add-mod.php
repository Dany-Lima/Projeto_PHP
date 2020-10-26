<form action="..//database/modalidades/create.php" method="POST" class="row">

	<fieldset class="formulario">
		<legend><img src="../imagem/luta.png" alt="[imagem]" width="100"></legend>
		<h5 class="light center"><strong>Cadastro de Modalidades</h5></strong>

		<div class="input-field col s12">
			<i class="material-icons prefix">directions_run</i>
			<input type="text" name="modalidade" id="modalidade" maxlength="255" required autofocus>
			<label for="modalidade">Digite a Modalidade</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">attach_money</i>
			<input type="number" name="mensalidade" id="mensalidade" step="10.00" min="10.00" required>
			<label for="mensalidade">Valor da Mensalidade</label>
		</div>

		<div class="input-field col s12">
			<input type="submit" value="Cadastar" class="btn">
			<input type="reset" value="Limpar" class="btn red">
		</div>
	</fieldset>
	
</form>