
<?php
define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');


require_once BASE . '/models/DTO/Mesa.php';
require_once BASE . '/Connection/Connection.php';
require_once BASE . '/models/DAO/DaoMesa.php';

$daoMesa = new DaoMesa();
$id = $_POST['id'];

if ($daoMesa->delete($id)) {
    echo 'Foi de americanas';
} else {
    echo 'Não foi de comes e bebes';
}


?>

<button><a href="../index.php" style="text-decoration: none;">Menu<a></button>