<?php require_once "..\sidebar.php"; ?>
<link rel="stylesheet" href="..\..\styles\venda.css">

<div class="home">
    <div class="principal">
        <div class="Add-Table">
            <h1>Vendas</h1>
        </div>

        <hr>

        <ul class="list-table">
            <?php


            define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\RocketFood');

            require_once BASE . '/models/DTO/venda.php';
            require_once BASE . '/Connection/Connection.php';
            require_once BASE . '/models/DAO/Daovenda.php';

            $daovenda = new Daovenda();
            $lista = $daovenda->listAll();

            ?>


            <table class="table">
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Mesa
                    </th>
                    <th>
                        Data
                    </th>
                    <th>
                        Chegada
                    </th>
                    <th>
                        Saida
                    </th>
                    <th>
                        Valor
                    </th>
                    <th>
                        Ações
                    </th cosplan="2">
                </tr>
                <?php
                foreach ($lista as $registro) {
                    $arraymesa = $daovenda->getMesa($registro['id_mesa']);
                ?>
                    <tr>
                        <td>
                            <?= $registro['id'] ?>
                        </td>
                        <td>
                            Mesa
                            <?= implode($arraymesa) ?>
                        </td>
                        <td>
                            <?= $registro['data'] ?>
                        </td>
                        <td>
                            <?= $registro['horaChegada'] ?>
                        </td>
                        <td>
                            <?php
                            if ($registro['horaSaida'] == null) {
                                echo 'Ainda ocupada';
                            }
                            if ($registro['horaSaida'] != null) {
                                echo $registro['horaSaida'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($registro['valorTotal'] == null) {
                                echo 'Não Fechou';
                            }
                            if ($registro['valorTotal'] != null) {
                                echo $registro['valorTotal'];
                            }
                            ?>
                        </td>

                        <td>


                            <button class="btn btn-danger icon btn-sm" data-bs-toggle="modal" data-bs-target="#delete-venda<?= $registro['id'] ?>"><i class='bx bxs-trash'></i></i></button>
                            <button class="btn btn-success icon btn-sm" data-bs-toggle="modal" data-bs-target="#info-Venda<?= $registro['id'] ?>"><i class='bx bx-info-circle'></i></button>
                        </td>
                    </tr>
                    <!-- Modal Delete-->
                    <div class="modal fade" id="delete-venda<?= $registro['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="deletevenda.php" method="post">
                                        <p>Vc tem certeza que quer excluir o venda:
                                            <?= $registro['nome'] ?> ??
                                        </p>
                                        <div class="modal-footer" style="justify-content: center;">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                                            <form action="deletevenda.php" method="post">

                                                <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                                                <button class="btn btn-success" data-bs-dismiss="modal">Sim</button>

                                            </form>
                                        </div>

                                    </form>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal INFO -->
                    <div class="modal fade" id="info-Venda<?= $registro['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Comanda</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-6">
                                        <label class="form-label"><strong>Hora de Chegada: </strong></label>
                                        <label class="form-label" type="text" name="nome" id="nome">
                                            <?= $registro['horaChegada'] ?>
                                        </label>
                                        <label class="form-label"><strong>Hora de Saida: </strong></label>
                                        <label class="form-label" type="text" name="nome" id="nome">
                                            <?= $registro['horaSaida'] ?>
                                        </label>
                                        <label class="form-label"><strong>Mesa: </strong></label>
                                        <label class="form-label" type="text" name="nome" id="nome">
                                            <?= $registro['id_mesa'] ?>
                                        </label>
                                    </div>

                                    <div class="div">
                                        <h5>Produtos Consumidos</h5>
                                        <ul>
                                            <?php

                                            require_once BASE . '/models/DAO/DAOItemVenda.php';

                                            $daoItemVenda = new DaoItemVenda();
                                            $vendaAberta = $daoMesa->getOpenVenda($registro['id']);

                                            $lista = $daoItemVenda->listForVenda($vendaAberta);
                                            $total = 0;
                                            
                                            foreach ($produtosConsumidos as $produto) { ?>
                                                <li>
                                                    <strong>Nome do Produto:</strong> <?= $produto['nome_produto'] ?><br>
                                                    <strong>Quantidade:</strong> <?= $produto['quantidade'] ?><br>
                                                    <strong>Preço Unitário:</strong> <?= $produto['preco_unitario'] ?><br>
                                                    <strong>Total:</strong> <?= $produto['total'] ?><br>
                                                </li>
                                            <?php } ?>
                                        </ul>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>





                <?php
                }
                ?>
            </table>
        </ul>
    </div>
</div>