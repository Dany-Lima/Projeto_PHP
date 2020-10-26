<?php 

interface crudAlunos{

	public function create();
	public function read();
	public function update($nome, $tel,$email,$modalidade, $id);
	public function delete($id);
	
}


 ?>