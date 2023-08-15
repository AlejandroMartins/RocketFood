<?php require_once "..\sidebar.php"; ?>
<link rel="stylesheet" href="..\..\styles\cardapio.css">



<section class="home">


    <div class="principal">
        <div class="head">
            <h1>Cardapio</h1>

            <div class="head-filtro">
                <form action="cardapio.php" method="post" id="formGrupo">


                    <select class="form-select filtro" name="idgrupo" id="idgrupo">

                        <?php

                        define('BASE', $_SERVER['DOCUMENT_ROOT'] . '/RocketFood');


                        require_once BASE . '/models/DTO/Produto.php';
                        require_once BASE . '/Connection/Connection.php';
                        require_once BASE . '/models/DAO/DaoProduto.php';

                        $idgrupo = 0;
                        if (isset($_POST['idgrupo'])) {
                            $idgrupo = $_POST['idgrupo'];
                        }


                        $daoProduto = new DaoProduto();
                        $listaGrupo = $daoProduto->listGrupo();
                        $filtroProdutos = 0;

                        echo '<option value="' . '0' . '">' . 'Todos' . '</option>';
                        foreach ($listaGrupo as $grupo) {
                            echo '<option ' . ($idgrupo == $grupo['id'] ? 'selected' : '') . ' value="' . $grupo['id'] . '">' . $grupo['nome'] . '</option>';
                        }

                        ?>


                    </select>

                </form>
                <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#create-produto"><i class='bx bx-plus-medical'></i></button>
            </div>





        </div>

    </div>

    <hr>

    <ul class="list-cardapio">

        <?php
        $idgrupo = 0;
        if (isset($_POST['idgrupo'])) {
            $idgrupo = $_POST['idgrupo'];
        }



        $daoProduto = new DaoProduto();
        $lista = $daoProduto->listForGrupo($idgrupo);


        foreach ($lista as $registro) {
        ?>

            <div class="card produto">
                <img src="../../Img/ft-teste.jpg" class="card-img-top">
                <div class="card-body">

                    <div class="card-title-orgnz">
                        <h5 class="card-title">
                            <?= $registro['nome'] ?>
                        </h5>
                        <h5 class="card-title">
                            <?= $registro['valor'] ?>
                        </h5>

                    </div>


                    <div class="buttons">


                        <button class="btn btn-success icon btn-sm" data-bs-toggle="modal" data-bs-target="#info-produto<?= $registro['id'] ?>"><i class='bx bx-info-circle'></i></button>

                        <button class="btn btn-primary icon btn-sm" data-bs-toggle="modal" data-bs-target="#editar-produto<?= $registro['id'] ?>"><i class='bx bxs-edit'></i></button>



                        <button class="btn btn-danger icon btn-sm" data-bs-toggle="modal" data-bs-target="#delete-produto<?= $registro['id'] ?>"><i class='bx bxs-trash'></i></i></button>

                        <!-- Modal Delete-->
                        <div class="modal fade" id="delete-produto<?= $registro['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="deleteProduto.php" method="post">
                                            <p>Vc tem certeza que quer excluir o produto:
                                                <?= $registro['nome'] ?> ??
                                            </p>
                                            <div class="modal-footer" style="justify-content: center;">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                                                <form action="deleteProduto.php" method="post">

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

                        <!-- Modal Update-->
                        <div class="modal fade" id="editar-produto<?= $registro['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar Produto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" action="updateProduto.php" method="post">

                                            <div class="col-md-6">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome" id="nome" value="<?= $registro['nome'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Valor</label>
                                                <input type="number" step="0.01" pattern="\d+(\.\d{1,2})?" name="valor" id="valor" class="form-control" value="<?= $registro['valor'] ?>">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Descrição</label>
                                                <input type="text" class="form-control" name="descricao" id="descricao" value="<?= $registro['descricao'] ?>">
                                            </div>
                                            <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal INFO-->
                        <div class="modal fade" id="info-produto<?= $registro['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informações do Produto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" action="updateProduto.php" method="post">

                                            <div class="col-md-6">
                                                <label class="form-label"><strong>Nome: </strong></label>
                                                <label class="form-label" type="text" name="nome" id="nome"><?= $registro['nome'] ?></label>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label"><strong>Valor: </strong></label>
                                                <label class="form-label" type="number" step="0.01" pattern="\d+(\.\d{1,2})?" name="valor" id="valor"><?= $registro['valor'] ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label"><strong>Descrição: </strong></label>
                                                <label class="form-label" type="text" name="descricao" id="descricao"><?= $registro['descricao'] ?></label>
                                            </div>
                                            <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


        <?php
        }
        ?>



    </ul>

    <!-- Modals -->

    <!-- Modal Create-->
    <div class="modal fade" id="create-produto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="newProduto.php" method="post" enctype="multipart/form-data">

                        <div class="col-md-6">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Valor</label>
                            <input type="number" step="0.01" pattern="\d+(\.\d{1,2})?" name="valor" id="valor" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descrição</label>
                            <input type="text" class="form-control" name="descricao" id="descricao">
                        </div>
                        <input type="file" class="form-control" name="file" id="file" accept="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("idgrupo").addEventListener('change', () => {
            document.getElementById("formGrupo").submit();
        });
    </script>

</section>