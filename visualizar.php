<?php
require_once "src/funcoes-alunos.php";
$listaAlunos = lerAlunos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="BootStrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1>Alunos | SELECT </h1>
    <hr>
    <h2>Lista de alunos</h2>
    <table  class="table  table-light">  
            <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-2">Nome</th>
                    <th class="col-1">Nota 1</th>
                    <th class="col-1">Nota 2</th>
                    <th class="col-1">Média</th>
                    <th class="col-1">Situação</th>
                    <th colspan="2" class="text-center col-1">Operações</th>
                </tr>
            </thead>
            <tbody>
        <?php   foreach ($listaAlunos as $alunos ) { ?>
                <tr>
                    <td><?=$alunos['id']?></td>
                    <td><?=$alunos['nome']?></td>
                    <td><?=$alunos['primeira']?></td>
                    <td><?=$alunos['segunda']?></td>
                    <td><?=$alunos['media']?></td>
                    <?php if($alunos['situacao'] == "aprovado" ){?><td class="bg-primary"><?=$alunos['situacao']?></td><?php } else{ ?> <td class="bg-danger"><?=$alunos['situacao']?> <?php } ?>
                    <td><a href="atualizar.php?id=<?=$alunos['id']?>" class="atualizar btn btn-primary btn-sm">Atualizar</a></td>
                    <td><a href="excluir.php?id=<?=$alunos['id']?>" class="excluir btn btn-danger btn-sm">Excluir</a></td>
                </tr>
        <?php        
        }  ?>
            </tbody>
    </table>
        <p><a href="inserir.php" class="btn btn-secondary btn-sm">Inserir novo aluno</a></p>
        <p><a href="index.php" class="btn btn-secondary btn-sm">Voltar ao início</a></p>
</div>
<script src="BootStrap/js/bootstrap.js"></script>
<script src="js/excluir.js"></script>
<script src="js/atualiza-campos.js"></script>
</body>
</html>