<?php
require_once "src/funcoes-alunos.php";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$dadosAluno = lerUmAluno($conexao, $id);
if (isset($_POST['atualizar-dados'])) {
    require_once "src/funcoes-alunos.php";
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $primeira = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_SPECIAL_CHARS); 
    $segunda = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_SPECIAL_CHARS); 
    $media = filter_input(INPUT_POST, 'media', FILTER_SANITIZE_SPECIAL_CHARS); 
    $situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $media = ($primeira + $segunda) / 2 ;
	if($media >= 7){
		$situacao = "aprovado";
	} else {
		$situacao = "reprovado";
	}
    atualizarAluno($conexao, $id, $nome, $primeira, $segunda, $media, $situacao);
    header("location:visualizar.php"); 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link rel="stylesheet" href="BootStrap/css/bootstrap.css">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="" method="post" class="container">
          
		<div class="mb-3 col-2">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?=$dadosAluno['nome']?>">
		</div>
		<div class="mb-3 col-2">
			<label for="primeira">Primeira Nota:</label>
			<input type="number" class="form-control" id="primeira" name="primeira" step="0.1" min="0.0" max="10"  value="<?=$dadosAluno['primeira']?>">
		</div>
		<div class="mb-3 col-2">
			<label for="primeira">Segunda Nota:</label>
			<input type="number" class="form-control" id="primeira" name="segunda" step="0.1" min="0.0" max="10" value="<?=$dadosAluno['segunda']?>">
		</div>
        <div class="mb-3 col-2">
			<label for="media">Média:</label>
			<input type="number" class="form-control" id="media" name="media" step="0.1" min="0.0" max="10" value="<?=$dadosAluno['media']?>" readonly disabled>
		</div>
        <div class="mb-3 col-2">
			<label for="situacao">Situação:</label>
			<input type="text" class="form-control" id="situacao" name="situacao" value="<?=$dadosAluno['situacao']?>" readonly disabled>
		</div>	    
        <button name="atualizar-dados"  class="btn btn-secondary">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php" class="btn btn-secondary">Voltar à lista de alunos</a></p>

</div>

<script src="BootStrap/js/bootstrap.js"></script>
</body>
</html>