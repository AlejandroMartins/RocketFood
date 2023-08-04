
<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

require_once BASE . '/models/DTO/Funcionario.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoFuncionario.php';

$daoFuncionario = new DaoFuncionario();
$id = $_POST['id'];


if ($daoFuncionario->delete($id)) {
    echo 'Foi de americanas';
    header("location: funcionarios.php");

} else {
    echo 'Não foi de comes e bebes';
}
?>

<button><a href="../index.php" style="text-decoration: none;">Menu<a></button>