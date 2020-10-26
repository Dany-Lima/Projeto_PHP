<?php 
// session_start();
require_once '../config/header.inc.html' ?>

<div class="row container">
	<div class="col s12"><p>&nbsp;</p>
		
		<?php 
			if(isset($_SESSION['Sucesso'])):
				echo "<p class='center green lighten-2 white-text' padding:10px>";
					echo $_SESSION['Sucesso'];
					unset($_SESSION['Sucesso']);
				echo "</p>";

			elseif(isset($_SESSION['Erro'])):
				echo "<p class='center red lighten-2 white-text' padding:10px>";
					echo $_SESSION['Erro'];
					unset($_SESSION['Erro']);
				echo "</p>";

			endif;

			require_once "../forms/form-add-alu.php";
		 ?>

	</div>
</div>


<div class="row container">
	<div class="col s12">
		<h5 class="light"><strong>Alunos Cadastrados</strong></h5>
		<hr>

		<!-- tabela -->
		<table class="striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Email</th>
					<th>Modalidade</th>
				</tr>
				<tbody>
					<?php 
						require_once "../database/alunos/read.php";
					 ?>
				</tbody>
			</thead>
			
		</table>

	</div>
</div>

<?php require_once '../config/footer.inc.html'?>