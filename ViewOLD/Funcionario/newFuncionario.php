<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Funcionario</title>
</head>

<body>

    <h1>Nova Funcionario</h1>

    <?php

    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/connectionBD');

    require_once BASE . '/models/DTO/Funcionario.php';
    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DAOFuncionario.php';


    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $senha = password_hash($senha,PASSWORD_DEFAULT);

    $Funcionario = new Funcionario($nome, $telefone, $usuario, $senha, $nivel_acesso);
    $daoFuncionario = new DaoFuncionario();

    if ($daoFuncionario->create($Funcionario)) {
        echo 'O funcionario foi salvo';
    } else {
        echo 'Not save.';
    }

    ?>
    <br>

    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>

</body>

</html>