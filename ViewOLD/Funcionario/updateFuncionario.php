<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');


require_once BASE . '/models/DTO/Funcionario.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoFuncionario.php';

$daoFuncionario = new DaoFuncionario();

$obj = $daoFuncionario->getById(1);

$obj->setSituacao('aberta');

if ($daoFuncionario->update($obj)) {
    echo 'Updaitando';
} else {
    echo 'NOT Updaitando.';
}

?>