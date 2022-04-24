function editarTarefa(id, tarefa, pagina = '') {
	const form = document.createElement('form');
	form.action = 'tarefa_controller.php?' + pagina + 'acao=atualizar';
	form.method = 'post';
	form.className = 'row';

	prepararTarefaDiv(form, id);
	adicionarMainInput(form, tarefa);
	adicionarIdInput(form, id);
	adicionarButton(form);
}

function prepararTarefaDiv(form, id) {
	let tarefaDiv = document.getElementById('tarefa_'+id);
	tarefaDiv.innerHTML = '';
	tarefaDiv.appendChild(form);
}

function adicionarMainInput(form, tarefa) {
	const mainInput = document.createElement('input');
	mainInput.type = 'text';
	mainInput.name = 'tarefa';
	mainInput.className = 'col-sm-9 form-control';
	mainInput.value = tarefa;

	form.appendChild(mainInput);
}

function adicionarIdInput(form, id) {


	const idInput = document.createElement('input');
	idInput.type = 'hidden';
	idInput.name = 'id';
	idInput.value = id;

	form.appendChild(idInput);
}

function adicionarButton(form) {
	let button = document.createElement('button');
	button.type = 'submit';
	button.className = 'col-sm-3 btn btn-info';
	button.innerHTML = 'Atualizar';

	form.appendChild(button);
}