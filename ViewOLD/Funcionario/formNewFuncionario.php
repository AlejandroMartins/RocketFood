<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadstro de Funcionario</title>
</head>

<body>
    <h1>Nova Funcionario</h1>
    <form action="newFuncionario.php" method="post">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">
        <br>
        
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <br>
        
        <label for="nivel_acesso">Nível de Acesso:</label>
        <input type="text" name="nivel_acesso" id="nivel_acesso">
        <br>

        <button type= "buttom">Cadastro</button>
        <button type= "submit">Salvar</button>
        <button type= "reset">Limpar</button>

    </form>

</body>
</html>