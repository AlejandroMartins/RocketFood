<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\RocketFood');


require_once BASE . '/models/DTO/Funcionario.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoFuncionario.php';

$daoFuncionario = new DaoFuncionario();

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$nivel_acesso = $_POST['nivel_acesso'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$Funcionario = new Funcionario($nome,$telefone,$usuario, $senha,$nivel_acesso);
var_dump($Funcionario);
if ($daoFuncionario->update($Funcionario, $id)) {
    echo 'Updaitando';
    header("location: funcionarios.php");
} else {
    echo 'NOT Updaitando.';
}

?>