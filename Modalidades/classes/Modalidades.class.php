<?php 
session_start();
require_once 'crudModalidades.php';
class Modalidades extends Connection implements crudModalidades{


	private $id, $modalidade, $mensalidade;

	// Metodos set
	protected function setId($id){
		$this->id = $id;
	}
	protected function setModalidade($modalidade){
		$this->modalidade = $modalidade;
	}
	protected function setMensalidade($mensalidade){
		$this->mensalidade = $mensalidade;
	}

	//Metodos Get
	protected function getId(){
		return $this->id;
	}
	protected function getModalidade(){
		return $this->modalidade;
	}
	protected function getMensalidade(){
		return $this->mensalidade;
	}

	//Metodos específicos
	public function dadosDoFormulario($modalidade, $mensalidade){
		$this->setModalidade($modalidade);
		$this->setMensalidade($mensalidade);
	}

	public function dadosDaTabela($id){
		$conn = $this->connect();

		$this->setId($id);
		$_id = $this->getId();

		$sql = 'SELECT * FROM tb_modalidade WHERE id = :id';
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('id', $_id);
		$stmt->execute();

		$result = $stmt->fetchALL();

		foreach ($result as $values):
			require_once "../forms/form-edit-mod.php";
		endforeach;
	}


	public function create(){
		$mod = $this->getModalidade();
		$mens = $this->getMensalidade();

		$conn = $this->connect();
		$sql = "insert into tb_modalidade values(default, :mod, :mens)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('mod', $mod);
		$stmt->bindParam('mens', $mens);

		if($stmt->execute()):
			$_SESSION['Sucesso'] = 'Cadastrado com Sucesso!!';
			$destino = header("Location:../../public/modalidades.php");

		else:
			$_SESSION['Erro'] = 'Modalidade já Cadastrada!!';
			$destino = header("Location:../../public/modalidades.php");
		endif;

	}

	public function read(){
		$conn = $this->connect();

		$sql = "select * from tb_modalidade";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchall();


		foreach ($result as $values):
			$this->setId($values['id']);
			$this->setModalidade($values['modalidade']);
			$this->setMensalidade($values['mensalidade']);

			$_id = $this->getId();
			$_mod = $this->getModalidade();
			$_mens = $this->getMensalidade();

			echo "<tr>";
				echo "<td>$_id</td>";
				echo "<td>$_mod</td>";
				echo "<td>$_mens</td>";

				echo "<td><a href='edit-mod.php?id=$_id'><i class='material-icons left'>edit</i>Editar</a></td>";
				echo "<td><a href='../database/modalidades/delete.php?id=$_id'><i class='material-icons left'>delete</i>Delete</a></td>";
				echo "<td><a href='alunos.php?id=$_id'><i class='material-icons left'>person_add</i>Novo Aluno</a></td>";
			echo "</tr>";

		endforeach;	

	}

	 public function update($modalidade, $mensalidade, $id){
			$conn = $this->connect();

			$this->setModalidade($modalidade);
			$this->setMensalidade($mensalidade);
			$this->setId($id);

			$mod = $this->getModalidade();
			$mens = $this->getMensalidade();
			$id = $this->getId();

			$sql = "update tb_modalidade set modalidade = :mod, mensalidade = :mens where id = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':mod',$mod);
			$stmt->bindParam(':mens',$mens);
			$stmt->bindParam(':id',$id);
			$stmt->execute();

			$destino = header("Location:../../public/modalidades.php");

		}

	public function delete($id){
		$conn = $this->connect();

		$this->setId($id);
		$_id = $this->getId();

		$sql = "delete from tb_modalidade where id = :id";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id',$_id);
		$stmt->execute();

		$destino = header("Location:../../public/modalidades.php");

	}


	public function todasModalidades(){
		$conn = $this->connect();

		$sql = 'SELECT * FROM tb_modalidade';
		$stmt = $conn->prepare($sql);

		$stmt->execute();

		return $stmt->fetchall();
	}



}	

 ?>