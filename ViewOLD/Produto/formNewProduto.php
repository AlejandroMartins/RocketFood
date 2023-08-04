<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadstro de Produto</title>
</head>

<body>
    <h1>Novo veículo</h1>
    <form action="newProduto.php" method="post">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" pattern="\d+(\.\d{1,2})?" name="valor" id="valor">
        <br>

        <label for="descricao">Descricão:</label>
        <input type="text" name="descricao" id="descricao">
        <br>

        <button type= "buttom">Cadastro</button>
        <button type= "submit">Salvar</button>
        <button type= "reset">Limpar</button>

    </form>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>
</body>

</html>