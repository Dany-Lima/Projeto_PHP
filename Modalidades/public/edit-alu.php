<?php require_once "../config/header.inc.html" ?>

<div class="row container">
	<div class="col s12"><p>&nbsp;</p>
		<?php 
		require_once "../classes/autoload.php";

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

		$editAlu = new Alunos();
		$editAlu->dadosDaTabelaAluno($id);

		?>
	</div>
</div>

<?php require_once "../config/footer.inc.html" ?>