<?php
session_start();
require_once "..\sidebar.php"; ?>
<link rel="stylesheet" href="..\..\styles\mesa.css">
<link rel="stylesheet" type="text/css" href="auth/css/util.css">

<div class="home">

    <div class="principal">
        <div class="Add-Table">
            <h1>Mesas</h1>
            <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal"
                data-bs-target="#create-table"><i class='bx bx-plus-medical'></i></button>
        </div>
        <hr>

        <ul class="list-table">
            <?php


            define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

            require_once BASE . '/models/DTO/Mesa.php';
            require_once BASE . '/Connection/Connection.php';
            require_once BASE . '/models/DAO/DaoMesa.php';

            $daoMesa = new DaoMesa();
            $lista = $daoMesa->listAll();


            foreach ($lista as $registro) {


                $situacao = $registro['aberta'];

                if ($situacao == 1) {
                    ?>
                    <button class="btn btn-success table table-components" data-bs-toggle="modal"
                        data-bs-target="#venda<?= $registro['id'] ?>">
                        <?= $registro['numero'] ?>
                    </button>
                    <?php
                }
                if ($situacao == 0) {
                    ?>
                    <button class="btn btn-danger table table-components" data-bs-toggle="modal"
                        data-bs-target="#venda<?= $registro['id'] ?>">
                        <?= $registro['numero'] ?>
                    </button>
                    <?php
                }
                ?>

                <!-- Modal Venda-->
                <div class="modal fade" id="venda<?= $registro['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Mesa
                                    <?= $registro['numero'] ?>
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!-- Criação da barra de abas -->
                                <ul class="nav nav-tabs abas-modal">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#comanda">Comanda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#adicionar-produto">Adicionar
                                            Produto</a>
                                    </li>
                                </ul>

                                <!-- Conteúdo das abas -->
                                <div class="tab-content">
                                    <!-- Aba Comanda -->
                                    <div id="comanda" class="container tab-pane active">

                                        <!-- Conteúdo da aba Comanda -->
                                        <?php
                                        if ($situacao == 1) {
                                            ?>

                                            <?php
                                        }
                                        if ($situacao == 0) {
                                            ?>
                                            <h5>Produtos Consumidos</h5>
                                            <table class="table table-produtos">

                                                <thead>
                                                    <tr>
                                                        <th class="align-left">Nome</th>
                                                        <th>Quantidade</th>
                                                        <th>Preço</th>
                                                        <th>Total</th>
                                                        <th colspan="3">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require_once BASE . '/models/DAO/DAOItemVenda.php';

                                                    $daoItemVenda = new DaoItemVenda();
                                                    $vendaAberta = $daoMesa->getOpenVenda($registro['id']);

                                                    $lista = $daoItemVenda->listForVenda($vendaAberta);
                                                    $total = 0;

                                                    foreach ($lista as $registro) {
                                                        $total = $total + $registro['valortotal'];
                                                        $arrayproduto = $daoItemVenda->getProduto($registro['id_Produto']);
                                                        ?>
                                                        <tr>
                                                            <td class="align-left">
                                                                <?= implode($arrayproduto) ?>
                                                            </td>
                                                            <td>
                                                                <?= $registro['quantidade'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $registro['preco'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $registro['valortotal'] ?>
                                                            </td>
                                                            <td>
                                                                <form action="deleteItemVenda.php" method="post">
                                                                    <input type="hidden" name="id" id="id"
                                                                        value=" <?= $registro['id'] ?> ">
                                                                    <button class="btn btn-danger btn-sm">
                                                                        <i class='bx bxs-trash'></i>
                                                                    </button>
                                                                </form>


                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>

                                        <!-- Aba Adicionar Produto -->
                                        <div id="adicionar-produto" class="container tab-pane fade">
                                            <!-- Adicione aqui o conteúdo da aba Adicionar Produto -->

                                            <form action="newItemVenda.php" method="post">
                                                <input type="hidden" name="id_venda" id="id_venda" value="<?= $vendaAberta ?>">
                                                <label for="idproduto">Produto</label><br>
                                                <select name="idproduto" id="idproduto">

                                                    <?php

                                                    define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/connectionBD');


                                                    require_once BASE . '/Connection/Connection.php';
                                                    require_once BASE . '/models/DAO/DAOProduto.php';

                                                    $daoProduto = new DaoProduto();
                                                    $lista = $daoProduto->listAll();
                                                    $valtot = 0;
                                                    foreach ($lista as $Produto) {
                                                        echo '<option value="' . $Produto['id'] . '">' . $Produto['nome'] . ' - ' . $Produto['valor'] . ' - ' . $Produto['descricao'] . '</option>';

                                                    }

                                                    ?>

                                                </select><br><br>
                                                <label for="quantidade">Quantidade</label><br>
                                                <input type="number" name="quantidade" id="quantidade" value=1><br><br>
                                                <button>Adicionar</button>
                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>








                            </div>

                            <div class="modal-footer ">
                                <?php
                                if ($situacao == 1) {
                                    ?>
                                    <form action="newVenda.php" method="post">
                                        <input type="hidden" name="id_mesa" id="id_mesa" value="<?= $registro['id'] ?>">
                                        <button class="btn btn-danger">Abrir venda</button>
                                    </form>
                                    <?php
                                }
                                if ($situacao == 0) {
                                    ?>
                                    <form action="closeVenda.php" class="form-footer" method="post">
                                        <input type="hidden" name="total" id="total" value="<?= sprintf("%.2f", $total) ?>">
                                        <input type="hidden" name="idvenda" id="idvenda" value="<?= $vendaAberta ?>">
                                        <h6>Total =
                                            <?= 'R$' . sprintf("%.2f", $total) ?>
                                        </h6>
                                        <div>
                                            <button class="btn btn-danger">Fechar
                                                venda</button>
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Salvar
                                            </button>
                                        </div>
                                    </form>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </ul>


        <!-- Modal -->
        <div class="modal fade" id="create-table" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Mesa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="newMesa.php" method="post">

                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="col-form-label">Número da Mesa: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="numero" id="numero">
                                </div>
                                <div class="col-auto">
                                    <label class="col-form-label">Situação: </label>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select" name="aberta" id="aberta">
                                        <option value='1'>Aberta</option>
                                        <option value=''>Fechada</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
                            </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <form>
            <input id="fortest" type="hidden" value="<?= $_SESSION['mesaaberta'] ?>">
        </form>
    </div>
    <script>
        window.addEventListener('load', () => {
            const id = document.getElementById("fortest").value;
            const myModal = new bootstrap.Modal(documenFt.getElementById('venda' + id));
            myModal.show();
        });
    </script>
    <!-- Adicione a referência ao jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Adicione a referência ao Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Adicione a referência ao Bootstrap.js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>