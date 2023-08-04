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
    <form action="newVenda.php" method="post">
        <label for="id_mesa"> Numero da Mesa:</label>
        <select name="id_mesa" id="id_mesa">
            <option value="null"></option>
            <?php

            define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/connectionBD');

            require_once BASE . '/models/DTO/Mesa.php';
            require_once BASE . '/Connection/Connection.php';
            require_once BASE . '/models/DAO/DAOMesa.php';

            $daoConexao = new DAOMesa();
            $lista = $daoConexao->listAbertas();

            foreach ($lista as $mesa) {
                $id_mesa = $mesa['id'];
                $numero = $mesa['numero'];
                echo "<option value='$id_mesa'>$numero</option>";
            }
            ?>

        </select>
        <button>Abrir venda</button>
    </form>
</body>

</html>