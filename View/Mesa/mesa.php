<?php
session_start();
require_once "../sidebar.php"; ?>
<link rel="stylesheet" href="..\..\styles\mesa.css">

<!-- Inclua os arquivos JavaScript do Bootstrap e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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


            define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\RocketFood');

            require_once BASE . '/models/DTO/Mesa.php';
            require_once BASE . '/Connection/Connection.php';
            require_once BASE . '/models/DAO/DaoMesa.php';

            $daoMesa = new DaoMesa();
            $lista = $daoMesa->listAll();


            foreach ($lista as $registro) {
                ?>
                <li>
                    <?php
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
                    <div class="modal fade" id="venda<?= $registro['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mesa
                                        <?= $registro['numero'] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">




                                    <!-- Conteúdo da aba Comanda -->
                                    <?php
                                    if ($situacao == 1) {
                                        ?>

                                        <?php
                                    }
                                    if ($situacao == 0) {
                                        ?>

                                        <ul class="nav nav-tabs" id="myTab<?= $registro['id'] ?>" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab<?= $registro['id'] ?>"
                                                    data-bs-toggle="tab" data-bs-target="#home-tab-pane<?= $registro['id'] ?>"
                                                    type="button" role="tab" aria-controls="home-tab-pane"
                                                    aria-selected="true">Comanda</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab<?= $registro['id'] ?>"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#profile-tab-pane<?= $registro['id'] ?>" type="button"
                                                    role="tab" aria-controls="profile-tab-pane" aria-selected="false">Adicionar
                                                    Produto</button>
                                            </li>
                                        </ul>


                                        <div class="tab-content" id="myTabContent<?= $registro['id'] ?>">
                                            <!-- Aba Comanda -->
                                            <div class="tab-pane fade show active" id="home-tab-pane<?= $registro['id'] ?>"
                                                role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                <h5>Produtos Consumidos</h5>
                                                <table class="table table-produtos">

                                                    <thead>
                                                        <tr>
                                                            <th class="align-left">Nome</th>
                                                            <th>Quantidade</th>
                                                            <th>Preço</th>
                                                            <th>Total</th>
                                                            <th colspan="1">Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        require_once BASE . '/models/DAO/DAOItemVenda.php';

                                                        $daoItemVenda = new DaoItemVenda();
                                                        $vendaAberta = $daoMesa->getOpenVenda($registro['id']);

                                                        $lista = $daoItemVenda->listForVenda($vendaAberta);
                                                        $total = 0;

                                                        foreach ($lista as $itens) {
                                                            $total = $total + $itens['valortotal'];
                                                            $arrayproduto = $daoItemVenda->getProduto($itens['id_Produto']);
                                                            ?>
                                                            <tr>
                                                                <td class="align-left">
                                                                    <?= implode($arrayproduto) ?>
                                                                </td>
                                                                <td>
                                                                    <?= $itens['quantidade'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $itens['preco'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $itens['valortotal'] ?>
                                                                </td>
                                                                <td>
                                                                    <form action="deleteItemVenda.php" method="post">
                                                                        <input type="hidden" name="id" id="id"
                                                                            value=" <?= $itens['id'] ?> ">
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
                                            <!-- Aba Adicionar Produtos -->
                                            <div class="tab-pane fade show" id="profile-tab-pane<?= $registro['id'] ?>"
                                                role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                                <form action="newItemVenda.php" method="post">
                                                    <br>
                                                    <input type="hidden" name="id_venda" id="id_venda"
                                                        value="<?= $vendaAberta ?>">
                                                    <label for="idproduto">Produto</label><br>
                                                    <select class="form-select" name="idproduto" id="idproduto">

                                                        <?php

                                                        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/RocketFood');


                                                        require_once BASE . '/Connection/Connection.php';
                                                        require_once BASE . '/models/DAO/DAOProduto.php';

                                                        $daoProduto = new DaoProduto();
                                                        $lista = $daoProduto->listAll();
                                                        $valtot = 0;
                                                        foreach ($lista as $Produto) {
                                                            echo '<option value="' . $Produto['id'] . '">' . $Produto['nome'] . ' - R$ ' . $Produto['valor'] . '</option>';

                                                        }

                                                        ?>

                                                    </select><br>
                                                    <label for="quantidade">Quantidade</label><br><br>

                                                    <div class="add-qtd">
                                                        <div class="input-group">
                                                            <div class="input-group-button">
                                                                <button class="btn btn-danger" type="button"
                                                                    id="btn-minus"><strong>-</strong></button>
                                                                <input type="number"
                                                                    class="form-control text-center input-add-qtd"
                                                                    id="input-number" value="1" name="quantidade"
                                                                    id="quantidade">
                                                                <button class="btn btn-success" type="button"
                                                                    id="btn-plus"><strong>+</strong></button>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Adicionar</button>
                                                    </div>

                                                </form>
                                            </div>


                                        </div>
                                        <?php

                                    }
                                    ?>
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
                                                <button class="btn btn-success">Fechar
                                                    venda</button>
                                                <form action="cancelVenda.php" method="post">
                                                    <button class="btn btn-danger">Cancelar
                                                        <input type="hidden" name="idvenda" id="idvenda"
                                                            value="<?= $vendaAberta ?>">
                                                </form>

                                                </button>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                    ?>

                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <?php

            }
            ?>
            </li>
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

                            <div class="row g-3 align-items-center form-mesa" style="margin-botton: 20px;">
                                <div class="col-auto">
                                    <label class="col-form-label">Número da Mesa: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="numero" id="numero">
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
       

    </div>
    <script>
        window.addEventListener('load', () => {
            const id = document.getElementById("fortest").value;
            const myModal = new bootstrap.Modal(document.getElementById('venda' + id));
            myModal.show();
        });

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
</div>