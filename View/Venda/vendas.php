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


            define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

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
                    </th>
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
                        Mesa <?= implode($arraymesa) ?>
                        </td>
                        <td>
                            <?= $registro['data'] ?>
                        </td>
                        <td>
                            <?= $registro['horaChegada'] ?>
                        </td>
                        <td>
                            <?= $registro['horaSaida'] ?>
                        </td>
                        <td>
                            <?= $registro['valorTotal'] ?>
                        </td>

                        <td>


                            <button class="btn btn-danger icon btn-sm" data-bs-toggle="modal"
                                data-bs-target="#delete-venda<?= $registro['id'] ?>"><i
                                    class='bx bxs-trash'></i></i></button>

                        </td>
                    </tr>
                    <!-- Modal Delete-->
                    <div class="modal fade" id="delete-venda<?= $registro['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form action="deletevenda.php" method="post">
                                                <p>Vc tem certeza que quer excluir o venda:
                                                    <?= $registro['nome'] ?> ??
                                                </p>
                                                <div class="modal-footer" style="justify-content: center;">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Não</button>
                                                    <form action="deletevenda.php" method="post">

                                                        <input type="hidden" name="id" id="id"
                                                            value=" <?= $registro['id'] ?> ">
                                                        <button class="btn btn-success" data-bs-dismiss="modal">Sim</button>

                                                    </form>
                                                </div>

                                            </form>
                                        </div>

                                        </form>
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
</div>