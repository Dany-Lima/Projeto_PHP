<?php 
//session_start();
require_once 'crudAlunos.php';
class Alunos extends Connection implements crudAlunos{

	private $id, $nome, $tel, $email, $modalidade;

	// Metodos set
	protected function setId($id){
		$this->id = $id;
	}
	protected function setNome($nome){
		$this->nome = $nome;
	}
	protected function setTel($tel){
		$this->tel = $tel;
	}
	protected function setEmail($email){
		$this->email = $email;
	}
	protected function setModalidade($modalidade){
		$this->modalidade = $modalidade;
	}
	

	//Metodos Get
	protected function getId(){
		return $this->id;
	}
	protected function getNome(){
		return $this->nome;
	}
	protected function getTel(){
		return $this->tel;
	}
	protected function getEmail(){
		return $this->email;
	}
	protected function getModalidade(){
		return $this->modalidade;
	}

	//Metodos específicos
	public function dadosDoFormularioAluno($nome, $tel, $email, $modalidade){
		$this->setNome($nome);
		$this->setTel($tel);
		$this->setEmail($email);
		$this->setModalidade($modalidade);
	}

	public function dadosDaTabelaAluno($id){
		$conn = $this->connect();

		$this->setId($id);
		$_id = $this->getId();

		$sql = 'SELECT * FROM tb_alunos WHERE id = :id';

		$stmt = $conn->prepare($sql);
		$stmt->bindParam('id', $_id);
		$stmt->execute();

		$result = $stmt->fetchALL();

		foreach ($result as $values):
			require_once "../forms/form-edit-alu.php";
		endforeach;
	}

	
	public function create(){
		$nome = $this->getNome();
		$tel = $this->getTel();
		$email = $this->getEmail();
		$mod = $this->getModalidade();
		

		$conn = $this->connect();
		$sql = "insert into tb_alunos values(default, :nome, :tel, :email, :mod)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('nome', $nome);
		$stmt->bindParam('tel', $tel);
		$stmt->bindParam('email', $email);
		$stmt->bindParam('mod', $mod);
		

		if($stmt->execute()):
			$_SESSION['Sucesso'] = 'Cadastrado com Sucesso!!';
			$destino = header("Location:../../public/alunos.php");

		else:
			$_SESSION['Erro'] = 'Aluno já Cadastrado!!';
			$destino = header("Location:../../public/alunos.php");
		endif;

	}

	public function read(){
		$conn = $this->connect();

		$sql = "select * from tb_alunos";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchall();

		foreach ($result as $values):
			$this->setId($values['id']);
			$this->setNome($values['nome']);
			$this->setTel($values['tel']);
			$this->setEmail($values['email']);
			$this->setModalidade($values['idModalidade']);
			

			$_id = $this->getId();
			$_nome = $this->getNome();
			$_tel = $this->getTel();
			$_email = $this->getEmail();
			$_mod = $this->getModalidade();
			
			$conn = $this->connect();
            $sql = "select * from td_modalidade where id = :mod";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':mod',$_mod);
            $stmt->execute();

			$result = $stmt->fetchall();
			foreach ($result as $values) {
				$nome = $values['modalidade'];
			}

			echo "<tr>";
				echo "<td>$_id</td>";
				echo "<td>$_nome</td>";
				echo "<td>$_tel</td>";
				echo "<td>$_email</td>";
				echo "<td>$_mod</td>";
				

				echo "<td><a href='edit-alu.php?id=$_id'><i class='material-icons left'>edit</i>Editar</a></td>";
				echo "<td><a href='../database/alunos/delete.php?id=$_id'><i class='material-icons left'>delete</i>Delete</a></td>";
			echo "</tr>";

		endforeach;	

	}

	 public function update($nome, $tel, $email, $idModalidade, $id){
			$conn = $this->connect();

			$this->setNome($nome);
			$this->setTel($tel);
			$this->setEmail($email);
			$this->setModalidade($idModalidade);
			$this->setId($id);

			$nome = $this->getNome();
			$tel = $this->getTel();
			$email = $this->getEmail();
			$mod = $this->getModalidade();
			$id = $this->getId();

			$sql = "update tb_alunos set nome = :nome, tel = :tel, email = :email, idModalidade = :mod where id = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nome',$nome);
			$stmt->bindParam(':tel',$tel);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':mod',$mod);
			$stmt->bindParam(':id',$id);
			$stmt->execute();

			$destino = header("Location:../../public/alunos.php");

		}

	public function delete($id){
		$conn = $this->connect();

		$this->setId($id);
		$_id = $this->getId();

		$sql = "delete from tb_alunos where id = :id";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id',$_id);
		$stmt->execute();

		$destino = header("Location:../../public/alunos.php");

	}



}	



 ?>