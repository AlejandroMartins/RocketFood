<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input com Botões</title>
    <!-- Inclua os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/mesa.css">
</head>

<body>

    <div class="input-group">
        <div class="input-group-prepend">
            <button class="btn btn-danger" type="button" id="btn-minus"><strong>-</strong></button>
        </div>
        <input type="text" class="form-control text-center input-add-qtd" id="input-number" value="1">
        <div class="input-group-append">
            <button class="btn btn-success" type="button" id="btn-plus"><strong>+</strong></button>
        </div>
    </div>


    <!-- Inclua os arquivos JavaScript do Bootstrap e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>

        $(document).ready(() => {
            var input = document.getElementById("input-number");
            var btnMinus = document.getElementById("btn-minus");
            var btnPlus = document.getElementById("btn-plus");

            btnMinus.addEventListener('click', () => {
                var value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            });

            btnPlus.addEventListener('click', () => {
                var value = parseInt(input.value);
                input.value = value + 1;
            });
        });

    </script>
</body>

</html>
<?php
// Função paFra verificar se o agente do usuário corresponde a um dispositivo móvel
function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER['HTTP_USER_AGENT']);
}
// Verifica se a tela é um dispositivo móvel
if (isMobile()) {
    require_once "..\menu-mobile.php";
} else {
    require_once "..\sidebar.php";
}
session_start();
?>