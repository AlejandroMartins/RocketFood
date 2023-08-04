<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listagem de Vendas</h1>
    <table border=1>
        <tr>
            <th>Id</th>
            <th>Id Mesa</th>
            <th>Aberta</th>
            <th>Data</th>
            <th>Hora Chegada</th>
            <th>Hora Saida</th>
            <th>Valor Total</th>

            <th colspan="2">Ações</th>

        </tr>

        <?php
        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

        require_once BASE . '/models/DTO/Venda.php';
        require_once BASE . '/Connection/Connection.php';
        require_once BASE . '/models/DAO/DaoVenda.php';

        $daoVenda = new DaoVenda();
        $lista = $daoVenda->listAll();


        foreach ($lista as $registro) {
            echo '<tr>';
            echo '<td>' . $registro['id'] . '</td>';
            echo '<td>' . $registro['id_mesa'] . '</td>';
            echo '<td>' . $registro['aberta'] . '</td>';
            echo '<td>' . $registro['data'] . '</td>';
            echo '<td>' . $registro['horaChegada'] . '</td>';
            echo '<td>' . $registro['horaSaida'] . '</td>';
            echo '<td>' . $registro['valorTotal'] . '</td>';

            ?>
            <td>
                <form action="deleteVenda.php" method="post">
                    <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                    <button>Excluir</button>
                </form>
            </td>




            <?php

            echo '<tr>';


        }

        ?>
    </table>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>
</body>

</html>