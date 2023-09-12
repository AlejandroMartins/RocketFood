<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\RocketFood');


require_once BASE . '/models/DTO/Produto.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoProduto.php';

$daoProduto = new DaoProduto();

$id = $_POST['id'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$nome_img = $_POST['nome_imagem'];

$Produto = new Produto( $valor, $nome,$nome_img,$descricao, $id );

if ($daoProduto->update($Produto)) {
    echo 'Updaitando';
    header("location: cardapio.php");
} else {
    echo 'NOT Updaitando.';
}

?>