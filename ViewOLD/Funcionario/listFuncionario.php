<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listagem de Funcionarios</h1>
    <table border= 1>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Usuario</th>
            <th>Senha</th>
            <th>Nivel Acesso</th>
            
        </tr>

        <?php
        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

        require_once BASE . '/models/DTO/Funcionario.php';
        require_once BASE . '/Connection/Connection.php';
        require_once BASE . '/models/DAO/DaoFuncionario.php';

        $daoFuncionario = new DaoFuncionario();
        $lista = $daoFuncionario->listAll();




        foreach ($lista as $registro) {
            echo '<tr>';
            echo '<td>' . $registro['id'] . '</td>';
            echo '<td>' . $registro['nome'] . '</td>';
            echo '<td>' . $registro['telefone'] . '</td>';
            echo '<td>' . $registro['usuario'] . '</td>';
            echo '<td>' . $registro['senha'] . '</td>';
            echo '<td>' . $registro['nivel_acesso'] . '</td>';
            echo '<tr>';


        }

        ?>
    </table>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>
</body>

</html>