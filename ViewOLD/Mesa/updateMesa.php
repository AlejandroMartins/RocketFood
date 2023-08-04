<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');


require_once BASE . '/models/DTO/Mesa.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoMesa.php';

$daoMesa = new DaoMesa();

$id = $_POST['id'];
$numero = $_POST['numero'];
$aberta = $_POST['aberta'];


$Mesa = new Mesa( $aberta, $numero, $id );

if ($daoMesa->update($Mesa)) {
    echo 'Updaitando';
    header('Location: http://localhost/connectionBD/View/Mesa/listMesa.php');
} else {
    echo 'NOT Updaitando.';
}

?>