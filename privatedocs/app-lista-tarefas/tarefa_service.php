<?php
// CRUD
class TarefaService {
	private $conexao;
	private $tarefa;
	
	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}
	
	public function inserir() { // Create
		$query = 'INSERT INTO tb_tarefas(tarefa)VALUES(:tarefa)';
		
		$pdoStatement = $this->conexao->prepare($query);		
		
		$pdoStatement->BindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$pdoStatement->execute();
	}
	
	public function recuperar() { // Read
		$query = '
			SELECT tb_tarefas.id, tb_status.status, tb_tarefas.tarefa
			FROM tb_tarefas LEFT JOIN tb_status ON(tb_tarefas.id_status = tb_status.id)
		';
		
		$pdoStatement = $this->conexao->prepare($query);
		$pdoStatement->execute();

		return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function atualizar() { // Update
		$query = 'UPDATE tb_tarefas SET tarefa = :tarefa WHERE id = :id';
		
		$pdoStatement = $this->conexao->prepare($query);
		$pdoStatement->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$pdoStatement->bindValue(':id', $this->tarefa->__get('id'));
		
		return $pdoStatement->execute();
	}
	
	public function remover() { // Delete
		$query = 'DELETE FROM tb_tarefas WHERE id = :id';
		
		$pdoStatement = $this->conexao->prepare($query);
		$pdoStatement->bindValue(':id', $this->tarefa->__get('id'));
		$pdoStatement->execute();
	}
	
	public function marcarConcluido() {
		$query = "UPDATE tb_tarefas SET id_status = :id_status WHERE id = :id";

		$pdoStatement = $this->conexao->prepare($query);
		$pdoStatement->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$pdoStatement->bindValue(':id', $this->tarefa->__get('id'));
		
		$pdoStatement->execute(); 
	}
	
	public function recuperarEspecifico() {
		$query = '
			SELECT tb_tarefas.id, tb_status.status, tb_tarefas.tarefa
			FROM tb_tarefas LEFT JOIN tb_status ON(tb_tarefas.id_status = tb_status.id)
			WHERE id_status = :id_status
		';
		
		$pdoStatement = $this->conexao->prepare($query);
		$pdoStatement->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$pdoStatement->execute();

		return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>