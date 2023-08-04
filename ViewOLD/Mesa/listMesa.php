<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listagem de Mesas</h1>
    <table border=1>
        <tr>

            <th>Numero</th>
            <th>Aberta</th>
            <th colspan="2">Ações</th>

        </tr>

        <?php
        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

        require_once BASE . '/models/DTO/Mesa.php';
        require_once BASE . '/Connection/Connection.php';
        require_once BASE . '/models/DAO/DaoMesa.php';

        $daoMesa = new DaoMesa();
        $lista = $daoMesa->listAll();




        foreach ($lista as $registro) {

            echo '<tr>';
            echo '<td>' . $registro['numero'] . '</td>';
            echo '<td>' . $registro['aberta'] . '</td>';
            ?>
            <td>
                <form action="deleteMesa.php" method="post">
                    <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                    <button>Excluir</button>
                </form>
            </td>


            
            <td>
                <form action="formUpdateMesa.php" method="post">
                    <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                    <input type="hidden" name="numero" value=" <?= $registro['numero'] ?> ">
                    <input type="hidden" name="aberta" value=" <?= $registro['aberta'] ?> ">
                    <button>Editar</button>
                </form>
            </td>
            <?php
            /*   echo '<td>';
            echo '<form action = "deleteMesa.php" method = "post">';
            echo '<input type="hidden" name="alejandro" id="alejandro" value="' . $registro['id'] . ' ">';
            echo '<button>Excluir</button></form>';
            echo '</td>'; */
            echo '<tr>';

        }

        ?>
    </table>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>
</body>

</html>