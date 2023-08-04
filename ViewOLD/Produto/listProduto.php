<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listagem de Produtos</h1>
    <table border= 1>
        <tr>
            <th>Id</th>
            <th>nome</th>
            <th>valor</th>
            <th>descricao</th>
            <th colspan="2">Ações</th>
            
        </tr>

        <?php
        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

        require_once BASE . '/models/DTO/Produto.php';
        require_once BASE . '/Connection/Connection.php';
        require_once BASE . '/models/DAO/DaoProduto.php';

        $daoProduto = new DaoProduto();
        $lista = $daoProduto->listAll();




        foreach ($lista as $registro) {
            echo '<tr>';
            echo '<td>' . $registro['id'] . '</td>';
            echo '<td>' . $registro['nome'] . '</td>';
            echo '<td>' . $registro['valor'] . '</td>';
            echo '<td>' . $registro['descricao'] . '</td>';
            ?>
            <td>
                <form action="deleteProduto.php" method="post">
                    <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                    <button>Excluir</button>
                </form>
            </td>
            
            <td>
                <form action="formUpdateProduto.php" method="post">
                    <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                    <input type="hidden" name="nome" value=" <?= $registro['nome'] ?> ">
                    <input type="hidden" name="valor" value=" <?= $registro['valor'] ?> ">
                    <input type="hidden" name="descricao" value=" <?= $registro['descricao'] ?> ">
                  
                    <button>Editar</button>
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