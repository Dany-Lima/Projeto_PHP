<?php 

abstract class Connection{
	
	private $serDB = 'mysql:host=localhost;dbname=db_site';
	private $user = 'root';
	private $pass = '';

	protected function connect(){
		try{

			$conn = new PDO($this->serDB,$this->user, $this->pass );
			$conn->exec('set names utf8');
			//echo "Conectado com Sucesso!!";
			return $conn;
		}catch(PDOException $erro){
			echo $erro->getMessage();
		}
	} 
}

 ?>