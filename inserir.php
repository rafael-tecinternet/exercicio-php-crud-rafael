<?php
if (isset($_POST['inserir'])) {
	require_once "src/funcoes-alunos.php";
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$primeira = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$segunda = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$media = ($primeira + $segunda) / 2 ;
	if($media >= 7){
		$situacao = "aprovado";
	} else {
		$situacao = "reprovado";
	}
	inserirAluno($conexao, $nome, $primeira, $segunda, $media, $situacao);
	header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link rel="stylesheet" href="BootStrap/css/bootstrap.css">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form class="container" action="" method="post">
		<div class="mb-3 col-2">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome" required>
		</div>
		<div class="mb-3 col-2">
			<label for="primeira">Primeira Nota:</label>
			<input type="number" class="form-control" id="primeira" name="primeira" step="0.1" min="0.0" max="10" required>
		</div>
		<div class="mb-3 col-2">
			<label for="primeira">Segunda Nota:</label>
			<input type="number" class="form-control" id="primeira" name="segunda" step="0.1" min="0.0" max="10" required>
		</div>
		<button type="submit" name="inserir" class="btn btn-secondary">Cadastrar aluno</button>
	</form>

    <hr>
	<p><a href="visualizar.php" class="btn btn-secondary">Voltar à lista de alunos</a></p>
    <p><a href="index.php" class="btn btn-secondary">Voltar ao início</a></p>
</div>
<script src="BootStrap/js/bootstrap.js"></script>
</body>
</html>