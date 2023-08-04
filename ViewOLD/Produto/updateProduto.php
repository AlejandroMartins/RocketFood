<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');


require_once BASE . '/models/DTO/Produto.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoProduto.php';

$daoProduto = new DaoProduto();

$id = $_POST['id'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];


$Produto = new Produto( $valor, $nome,$descricao, $id );

if ($daoProduto->update($Produto)) {
    echo 'Updaitando';
    header('Location: http://localhost/connectionBD/View/Produto/listProduto.php');
} else {
    echo 'NOT Updaitando.';
}

?>