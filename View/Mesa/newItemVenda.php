<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Reserva</title>
  <link rel="stylesheet" href="..\..\styles\comanda-itemvenda.css">
</head>

<body>

  <!DOCTYPE html>
  <html>

  <?php
  define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\RocketFood');

  require_once BASE . '/models/DTO/ItemVenda.php';
  require_once BASE . '/Connection/Connection.php';
  require_once BASE . '/models/DAO/DaoItemVenda.php';


  session_start();

  $idVenda = $_POST['id_venda'];
  $idProduto = $_POST['idproduto'];
  $quantidade = $_POST['quantidade'];
  $observacao = $_POST['observacao'];


  $itemVenda = new ItemVenda($idProduto, $idVenda, $quantidade, 0, 0, $observacao, null);

  $daoItemVenda = new DaoItemVenda();

  if ($daoItemVenda->create($itemVenda)) {
    header("location: mesa.php");
  } else {
  }
  ?>

  </html>