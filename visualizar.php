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
<style>
    .aprovado {color: blue;}
    .reprovado {color: red;}
</style>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Alunos | SELECT </h1>
    <hr>
<table>  
        <caption>Lista de Alunos</caption>  
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Média</th>
                <th>Situação</th>
                <th colspan="2">Operações</th>
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
                <td class="<?=verificaMedia($media)?>"><?=$alunos['situacao']?></td>
                <td><a href="atualizar.php?id=<?=$alunos['id']?>" class="atualizar">Atualizar</a></td>
                <td><a href="excluir.php?id=<?=$alunos['id']?>" class="excluir">Excluir</a></td>
            </tr>
    <?php        
    }  ?>
        </tbody>
</table>

    <p><a href="inserir.php">Inserir novo aluno</a></p>
    <p><a href="index.php">Voltar ao início</a></p>
</div>
<script src="js/excluir.js"></script>
</body>
</html>