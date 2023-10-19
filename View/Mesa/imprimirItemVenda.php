<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Reserva</title>
    <link rel="stylesheet" href="..\..\styles\comanda-itemvenda.css">
</head>

<body>

    <!DOCTYPE html>
    <html>

    <?php
    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\RocketFood');

    require_once BASE . '/models/DTO/ItemVenda.php';
    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DaoItemVenda.php';


    session_start();

    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $valortotal = $_POST['valortotal'];
    $observacao = $_POST['observacao'];
    $hora = $_POST['hora'];
    $dataPedido = date('d/m/Y', strtotime($_POST['dataPedido']));

    if ($observacao == null) {
        $observacao = 'Esse pedido não tem observação';
    }


    ?>


    <body>
        <div class="comanda">
            <p class="line">------------------------------------</p>
            <div class="header">
                <h1>MESA <?= 2 ?></h1>
            </div>
            <p class="line">------------------------------------</p>
            <div class="data">
                <p>Data:
                    <?= $dataPedido ?>
                </p>
                <p>Hora:
                    <?=$hora?>
                </p>
            </div>
            <p class="line">------------------------------------</p>
            <div class="lista-produtos">
                <table>
                    <tr classs="header-lista">
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor</th>
                    </tr>

                    <tr class="produto">
                        <td>
                            <?= $quantidade ?>
                        </td>
                        <td>
                            <?= $produto ?>
                        </td>
                        <td>
                            <?=  $valortotal ?>
                        </td>
                    </tr>
                </table>
            </div>
            <p class="line">------------------------------------</p>
            <div class="observacoes">
                <p class="data">Observações:</p>
                <p>-
                    <?= $observacao ?>
                </p>
            </div>
            <p class="line">------------------------------------</p>
        </div>


    </body>

    </html>


</body>
<script>
    window.addEventListener('afterprint', function() {
        // Redireciona a página para a URL desejada após a impressão
        window.location.href = 'mesa.php';
    });
    window.addEventListener('load', () => {
        window.print();
    })
</script>

</html>