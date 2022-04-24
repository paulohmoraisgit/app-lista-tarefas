<?php
	$acao = 'recuperar';
	require_once 'tarefa_controller.php';
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script src="./js/editarTarefa.js"></script>
		<script src="./js/removerTarefa.js"></script>
		<script src="./js/marcarTarefaConcluido.js"></script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="">
					<img src="./img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>
		
		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item p-0">
							<a href="index.php" class="d-block" style="padding: 0.9rem">Tarefas pendentes</a>
						</li>
						<li class="list-group-item p-0">
							<a href="tarefas_concluidas.php" class="d-block" style="padding: 0.9rem">Tarefas concluídas</a>
						</li>
						<li class="list-group-item active p-0">
							<a href="" class="d-block" style="padding: 0.9rem">Todas tarefas</a>
						</li>
						<li class="list-group-item p-0">
							<a href="nova_tarefa.php" class="d-block" style="padding: 0.9rem">Nova tarefa</a>
						</li>
					</ul>
				</div>
				
				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />
								
								<?php foreach ($tarefas as $i => $tarefa) { ?>
									
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $tarefa['id'] ?>">
											<?= $tarefa['tarefa'] . ' (' . $tarefa['status'] . ')' ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="removerTarefa(<?= $tarefa['id'] ?>)" style="cursor: pointer"></i>

											<?php if($tarefa['status'] == 'pendente') { ?>

												<i class="fas fa-edit fa-lg text-info" onclick="editarTarefa(<?= $tarefa['id'] ?>, '<?= $tarefa['tarefa'] ?>')" style="cursor: pointer"></i>
												
												<i class="fas fa-check-square fa-lg text-success" onclick="marcarTarefaConcluido(<?= $tarefa['id'] ?>)" style="cursor: pointer"></i>

											<?php } ?>

										</div>
									</div>
									
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>