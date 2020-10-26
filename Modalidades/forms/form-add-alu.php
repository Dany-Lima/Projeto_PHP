<form action="../database/alunos/create.php" method="POST" class="row">

	<fieldset class="formulario">
		<legend><img src="../imagem/pessoa.png" alt="[imagem]" width="100"></legend>
		<h5 class="light center"><strong>Cadastro de Alunos</h5></strong>

		<div class="input-field col s12">
			<i class="material-icons prefix">account_box</i>
			<input type="text" name="nome" id="nome" maxlength="255" required autofocus>
			<label for="nome">Digite o Nome do Aluno</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">local_phone</i>
			<input type="tel" name="tel" id="tel" maxlength="15" required autofocus>
			<label for="tel">Telefone do Aluno</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">local_post_office</i>
			<input type="email" name="email" id="email" maxlength="50" required>
			<label for="email">Email do Aluno</label>
		</div>

		<div class="input-field col s12">
			<i class="material-icons prefix">directions_run</i>
			<select name="idModalidade" id="idModalidade">
				<option value="" disabled selected>Selecione a Modalidade</option>

				<?php 
					require_once '../classes/autoload.php';

					$todosMod = new modalidades();

					$result = $todosMod->todasModalidades();

					foreach ($result as $value):
						echo '<option value="' . $value['id'] . '">' . $value['modalidade'] .'</option>';
					endforeach;
				?>
			</select>
			<label for="idModalidade">Modalidade</label>
		</div> 


		<div class="input-field col s12">
			<input type="submit" value="Cadastar" class="btn">
			<input type="reset" value="Limpar" class="btn red">
		</div>

	</fieldset>
	
</form>


