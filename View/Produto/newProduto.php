<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto</title>
</head>

<body>

    <h1>Novo Produto</h1>

    <?php

    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/connectionBD');

    require_once BASE . '/models/DTO/Produto.php';
    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DAOProduto.php';


    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];


    $Produto = new Produto($valor, $nome, $descricao);
    $daoProduto = new DaoProduto();

    if ($daoProduto->create($Produto)) {
        header("location: cardapio.php");
    } else {
        echo 'Not save.';
    }

    ?>
    <br>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>

</body>

</html>