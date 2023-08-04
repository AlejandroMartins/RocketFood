<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadstro de Mesa</title>
</head>

<?php

$id = $_POST['id'];
$numero = $_POST['numero'];
$aberta = $_POST['aberta'];


?>

<body>
    <h1>Alterar Mesa</h1>
    <form action="updateMesa.php" method="post">

        <label for="numero">Numero:</label>
        <input type="text" name="numero" id="numero" value=" <?= $numero ?>">
        <br>

        <input type="hidden" name="id" value=" <?= $id ?>">

        <label for="situacao">situacao:</label>
        <!-- <input type="" name="situacao" id="situacao"> -->

        <select name="aberta" id="aberta">
            <option <?= ($aberta == " 1 "? 'selected' : '') ?> value= '1' >Aberta</option>
            <option <?= ($aberta == " 0 "? 'selected' : '') ?> value= '' >Fechada</option>
        </select> <br>



        
        <button type="submit">Salvar</button>
        <button type="reset">Limpar</button>

    </form>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>
</body>

</html>