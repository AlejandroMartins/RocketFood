<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Mesa</title>
</head>

<body>

    <h1>Nova Mesa</h1>

    <?php

    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/RocketFood');

    require_once BASE . '/models/DTO/Mesa.php';
    require_once BASE . '/Connection/Connection.php';
    require_once BASE . '/models/DAO/DAOMesa.php';


    $numero = $_POST['numero'];
    $situacao = (bool)($_POST['aberta']);
  

    $Mesa = new Mesa($situacao, $numero);
    $daoMesa = new DaoMesa();

    if ($daoMesa->create($Mesa)) {
        
        header("location: mesa.php");
    } else {
      
    }

    ?>
    <br>

    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>

</body>

</html>