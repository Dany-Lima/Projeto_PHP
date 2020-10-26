<?php 

require_once "../../classes/autoload.php";

//nome, tel, email, modalidade
$nome  = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$tel  = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
$email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$modalidade  = filter_input(INPUT_POST, 'idModalidade', FILTER_SANITIZE_NUMBER_INT);


$newAlu = new alunos();
$newAlu->dadosDoFormularioAluno($nome, $tel, $email, $modalidade);
$newAlu->create();

 ?>