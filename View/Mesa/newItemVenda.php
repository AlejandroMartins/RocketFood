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
    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\RocketFood');

    require_once BASE . '/models/DTO/ItemVenda.php';
    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DaoItemVenda.php';


    session_start();

    $idVenda = $_POST['id_venda'];
    var_dump($idVenda);
    $idProduto = $_POST['idproduto'];
    $quantidade = $_POST['quantidade'];


    $itemVenda = new ItemVenda( $idProduto,$idVenda, $quantidade, 0, 0, null);

    $daoItemVenda = new DaoItemVenda();

    if ($daoItemVenda->create($itemVenda)) {
        header("location: mesa.php");
    } else {
        echo 'Deu ruim.';
    }

    ?>
</body>

</html>