<form action="../database/alunos/update.php" method="POST" class="row">

	<fieldset class="formulario">
		<legend><img src="../imagem/pessoa.png" alt="[imagem]" width="100"></legend>
		<h5 class="light center"><strong>Editar Aluno</h5></strong>

		<div class="input-field col s12">
			<input type="hidden" name="id" value="<?php echo $values['id']?>">
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">account_box</i>
			<input type="text" name="nome" id="nome" value="<?php echo $values['nome']?>" required>
			<label for="nome">Digite o Nome do Aluno</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">local_phone</i>
			<input type="tel" name="tel" id="tel" value="<?php echo $values['tel']?>" required>
			<label for="tel">Digite o Telefone do Aluno</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">local_post_office</i>
			<input type="email" name="email" id="email" value="<?php echo $values['email']?>" required>
			<label for="email">Digite o Email do Aluno</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">directions_run</i>
			<select name="idModalidade" id="idModalidade">
				<option value="" disabled selected>Selecione a Modalidade</option>

				<?php 
					require_once '../classes/autoload.php';

					$todosMod = new modalidades();

					$result = $todosMod->todasModalidades();

					foreach($result as $value){
						if($values['idModalidade'] == $value['id']) 
							echo '<option value="' . $value['id'] .'" selected>' . $value['modalidade'] .'</option>';
						else echo '<option value= "' . $value['id'] .'">' . $value['modalidade'] .'</option>';
					}
				?>
			</select>
			<label for="idModalidade">Modalidade</label>
		</div>

		<div class="input-field col s12">
			<input type="submit" name="Alterar" class="btn">
			<a href="alunos.php" class="btn">Cancelar</a>
		</div>

	</fieldset>

</form>
