<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Venda</title>
</head>
<body>
    <h1>Itens da Venda</h1>
    <form action="newItemVenda.php" method="post">
        <label for="idproduto">Produto</label><br>
        <select name="idproduto" id="idproduto">
            <?php
            define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/connectionBD');
            require_once BASE . '/Connection/Connection.php';
            require_once BASE . '/models/DAO/DAOProduto.php';
            $daoProduto = new DaoProduto();
            $lista = $daoProduto->listAll();
            foreach ($lista as $Produto) {
                echo '<option value="' . $Produto['id'] . '">' . $Produto['nome'] . ' - ' . $Produto['valor'] . ' - ' . $Produto['descricao'] . '</option>';
            }
            ?>
        </select><br><br>
        <label for="quantidade">Quantidade</label><br>
        <input type="number" name="quantidade" id="quantidade" value=1><br><br>
        <button>Adicionar</button>
    </form>
    <br><br>
    <table border="1">
        <tr>
            <th>PRODUTO</th>
            <th>QUANTIDADE</th>
            <th>PRECO</th>
            <th>VALOR TOTAL</th>
            <th colspan="2">Ações</th>
        </tr>
        <?php
        require_once BASE . '/Connection/Connection.php';
        require_once BASE . '/models/DAO/DAOItemVenda.php';
        $daoItemVenda = new DaoItemVenda();
        session_start();
        $lista = $daoItemVenda->listForVenda($_SESSION['vendaaberta']);
        $total = 0;
        foreach ($lista as $registro) {
            echo '<tr>';
            $arrayproduto = $daoItemVenda->getProduto($registro['id_Produto']);
            $nomeproduto = implode($arrayproduto);
            echo '<td>' . $nomeproduto . '</td>';
            echo '<td>' . $registro['quantidade'] . '</td>';
            echo '<td>' . $registro['preco'] . '</td>';
            echo '<td>' . $registro['valortotal'] . '</td>';
            ?>
            <td>
                <form action="deleteItemVenda.php" method="post">
                    <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                    <button>Excluir</button>
                </form>
            </td>
            <?php
            echo '</tr>';
            $total += $registro['valortotal'];
        }
        ?>
    </table><br><br>
    <form action="closeVenda.php" method="post">
        <input type="hidden" name="idvenda" id="idvenda" value="<?= $_SESSION['vendaaberta'] ?>">
        <input type="hidden" name="total" id="total" value="<?= sprintf("%.2f", $total) ?>">
        <label>Total =
            <?= 'R$' . sprintf("%.2f", $total) ?>
        </label><br>
        <button>Fechar a venda</button>
    </form>
</body>
</html>