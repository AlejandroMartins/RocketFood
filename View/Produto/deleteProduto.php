
<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

require_once BASE . '/models/DTO/Produto.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoProduto.php';

$daoProduto = new DaoProduto();
$id = $_POST['id'];


if ($daoProduto->delete($id)) {
    echo 'Foi de americanas';
    header("location: cardapio.php");

} else {
    echo 'Não foi de comes e bebes';
}
?>

<button><a href="../index.php" style="text-decoration: none;">Menu<a></button>