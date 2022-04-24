function removerTarefa(id, pagina = '') {
	location.href = 'todas_tarefas.php?' + pagina + 'acao=remover&id='+id;
}