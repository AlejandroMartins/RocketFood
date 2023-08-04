
<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

require_once BASE . '/models/DTO/Funcionario.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoFuncionario.php';

$daoFuncionario = new DaoFuncionario();

if ($daoFuncionario->delete(1)) {
    echo 'Foi de americanas';
} else {
    echo 'Não foi de comes e bebes';
}
?>