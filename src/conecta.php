<?php
$servidor = "localhost";
$usuario = "webmaio1_rafael";
$senha = "naolembro";
$banco = "webmaio1_crudrafa";
try {
    $conexao = new PDO("mysql:host=$servidor; dbname=$banco; charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $erro){
    die("Erro: " .$erro->getMessage());
}
?>