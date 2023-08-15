<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Venda</title>
</head>

<body>
    <h1>Cadastro de Venda</h1>
    <?php
    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/RocketFood');


    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DAOVenda.php';

    $idvenda = $_POST['idvenda'];
    $totalVenda = $_POST['total'];
    $daoVenda = new DaoVenda();

    if ($idDaVenda = $daoVenda->close($idvenda, $totalVenda)) {  
        header("location: mesa.php");
        echo 'Deu bom.';
    } else {
        echo 'Deu ruim.';
    }

    ?>
</body>

</html>