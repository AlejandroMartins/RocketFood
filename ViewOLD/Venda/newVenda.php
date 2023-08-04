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

    require_once BASE . '/models/DTO/Venda.php';
    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DaoVenda.php';

    $mesa = $_POST['id_mesa'];
    var_dump($mesa);
    $venda = new Venda(date('Y-m-d H:i:s'), null, $mesa, null);

    $DAOVenda = new DaoVenda();

    if ($idDaVenda = $DAOVenda->open($venda)) {
        //echo 'Venda cadastrada com sucesso. Código: ';
        session_start();
        $_SESSION['vendaaberta'] = $idDaVenda;
        var_dump($_SESSION['vendaaberta']);
        header("location: formNewItemVenda.php");
    } else {
        echo 'Deu ruim.';
    }

    ?>
</body>
</html>