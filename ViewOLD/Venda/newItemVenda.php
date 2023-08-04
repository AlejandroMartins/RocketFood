<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Reserva</title>
</head>

<body>
    <h1>Cadastro de Reserva</h1>
    <?php
    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

    require_once BASE . '/models/DTO/ItemVenda.php';
    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DaoItemVenda.php';


    session_start();

    $idVenda = $_SESSION['vendaaberta'];
    $idProduto = $_POST['idproduto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['valor'];

    $itemVenda = new ItemVenda( $idProduto,$idVenda, $quantidade, $preco, 0, null);

    $daoItemVenda = new DaoItemVenda();

    if ($daoItemVenda->create($itemVenda)) {
        header("location: formNewItemVenda.php");
    } else {
        echo 'Deu ruim.';
    }

    ?>
</body>
</html>