function marcarTarefaConcluido(id, pagina = '') {
	location.href = 'todas_tarefas.php?' + pagina + 'acao=marcarConcluido&id='+id;
}