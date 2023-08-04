<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadstro de Mesa</title>
</head>

<body>
    <h1>Nova Mesa</h1>
    <form action="newMesa.php" method="post">

        <label for="numero">Numero:</label>
        <input type="text" name="numero" id="numero">
        <br>

        <label for="situacao">situacao:</label>
        <!-- <input type="" name="situacao" id="situacao"> -->

        <select name="aberta" id="aberta">
            <option value = '1'>Aberta</option>
            <option value = ''>Fechada</option>
        </select> <br>


        <button type="buttom">Cadastro</button>
        <button type="submit">Salvar</button>
        <button type="reset">Limpar</button>

    </form>
    <button><a href="../index.php" style="text-decoration: none;">Menu<a></button>
</body>

</html>