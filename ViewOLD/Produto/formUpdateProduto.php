<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadstro de Produto</title>
</head>

<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

$valortxt = $_POST['valor'];
$valor = floatval(trim($valortxt));



?>

<body>
    <h1>Alterar Produto</h1>
    <form action="updateProduto.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= $nome ?>">
        <br>

        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" value="<?= $valor ?>">
        <br>
        

        <label for="descricao">Nome:</label>
        <input type="text" name="descricao" id="descricao" value="<?= $descricao ?>">
        <br>

        <input type="hidden" name="id" value="<?= $id ?>">



        <button type="buttom">Cadastro</button>
        <button type="submit">Salvar</button>
        <button type="reset">Limpar</button>

    </form>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>
</body>

</html>