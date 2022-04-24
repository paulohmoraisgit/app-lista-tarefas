<?php
	require_once '../../privatedocs/app-lista-tarefas/tarefa_model.php';
	require_once '../../privatedocs/app-lista-tarefas/tarefa_service.php';
	require_once '../../privatedocs/app-lista-tarefas/conexao.php';

	if(isset($_GET['acao'])) $acao = $_GET['acao'];

	$conexao = new Conexao();
	$tarefa = new Tarefa();

	switch($acao) {
		case 'inserir':
			acaoInserir($conexao, $tarefa);
			break;

		case 'recuperar':
			$tarefas = acaoRecuperar($conexao, $tarefa);
			break;

		case 'atualizar':
			acaoAtualizar($conexao, $tarefa);
			break;
			
		case 'remover':
			acaoRemover($conexao, $tarefa);
			break;

		case 'marcarConcluido':
			acaoMarcarConcluido($conexao, $tarefa);
			break;

		case 'recuperarPendentes':
			$tarefas = acaoRecuperarEspecifico($conexao, $tarefa, 1);
			break;
			
		case 'recuperarConcluidos':
			$tarefas = acaoRecuperarEspecifico($conexao, $tarefa, 2);
			break;
	}
	
	function acaoInserir($conexao, $tarefa) {
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('location: ./nova_tarefa.php?inclusao=1');
	}

	function acaoRecuperar($conexao, $tarefa) {
		$tarefaService = new TarefaService($conexao, $tarefa);
		return $tarefaService->recuperar();
	}
	
	function acaoAtualizar($conexao, $tarefa) {
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->atualizar();
		
		redirecionar();
	}
	
	function acaoRemover($conexao, $tarefa) {
		$tarefa->__set('id', $_GET['id']);

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();
		
		redirecionar();
	}

	function acaoMarcarConcluido($conexao, $tarefa) {
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarConcluido();

		redirecionar();
	}

	function acaoRecuperarEspecifico($conexao, $tarefa, $id_status) {
		$tarefa->__set('id_status', $id_status);
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		return $tarefaService->recuperarEspecifico();
	}

	function redirecionar() {
		if(isset($_GET['ref'])) header('location: ./index.php');
		else header('location: ./todas_tarefas.php');
	}
?>