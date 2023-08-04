<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    <title>Document</title>
</head>

<body style = 'margin: 30px'>

<h1>Listagem de Mesas</h1>
    <table class="table">
        <tr>
            <th>
                Numero
            </th>
            <th>
                Aberta
            </th>
            <th>
                
            </th>

        </tr>

        <?php
        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');
        require_once BASE . '/models/DTO/Mesa.php';
        require_once BASE . '/Connection/Connection.php';
        require_once BASE . '/models/DAO/DaoMesa.php';

        $daoMesa = new DaoMesa();
        $lista = $daoMesa->listAll();

        foreach ($lista as $item) {
            echo '<tr>';
            echo '<td>' . $item['numero'] . '</td>';


            echo '<td>' . $item['aberta'] . '</td>';

            echo '<td>';
            echo '<button class="btn btn-success details btn-sm" ><i class="fa fa-info"></i></button>';

            echo '<button class="btn btn-primary edit btn-sm" ><i class="fa fa-edit"></i></button>';
            
            echo '<button class="btn btn-danger delete btn-sm" ><i class="fa fa-trash"></i></button>';
            echo '</td>';
            echo '</tr>';

        }

        ?>


    </table>
</body>

</html>