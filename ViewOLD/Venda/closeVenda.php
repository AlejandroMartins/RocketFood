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
        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/connectionBD');

            
        require_once BASE . '/Connection/Connection.php';
        require_once BASE . '/models/DAO/DAOVenda.php';

        $idvenda = $_POST['idvenda'];
        $val = $_POST['total'];
        var_dump($val);
        $daoVenda = new DaoVenda();

        if($idDaVenda = $daoVenda->close($idvenda, $val)) {
            session_start();
            unset($_SESSION['vendaaberta']);
            header("location: listVenda.php");
        } else {
            echo 'Deu ruim.';
        }

        ?>
    </body>
</html>

