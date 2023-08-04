<?php require_once "..\sidebar.php"; ?>
<link rel="stylesheet" href="..\..\styles\funcionarios.css">

<div class="home">

    <div class="principal">
        <div class="Add-Table">
            <h1>Funcionarios</h1>
            <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal"
                data-bs-target="#create-funcionario"><i class='bx bx-plus-medical'></i></button>
        </div>

        <hr>

        <ul class="list-table">
            <?php


            define('BASE', $_SERVER['DOCUMENT_ROOT'] . '\connectionBD');

            require_once BASE . '/models/DTO/Funcionario.php';
            require_once BASE . '/Connection/Connection.php';
            require_once BASE . '/models/DAO/DaoFuncionario.php';

            $daoFuncionario = new DaoFuncionario();
            $lista = $daoFuncionario->listAll();

            ?>


            <table class="table">
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Telefone
                    </th>
                    <th>
                        Usuario
                    </th>

                    <th>
                        Ações
                    </th>
                </tr>
                <?php
                foreach ($lista as $registro) {
                    ?>
                    <tr>
                        <td>
                            <?= $registro['nome'] ?>
                        </td>
                        <td>
                            <?= $registro['telefone'] ?>
                        </td>
                        <td>
                            <?= $registro['usuario'] ?>
                        </td>

                        <td>

                            <button class="btn btn-success icon btn-sm" data-bs-toggle="modal"
                                data-bs-target="#info-Funcionario<?= $registro['id'] ?>"><i
                                    class='bx bx-info-circle'></i></button>

                            <button class="btn btn-primary icon btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editar-Funcionario<?= $registro['id'] ?>"><i class='bx bxs-edit'></i></button>



                            <button class="btn btn-danger icon btn-sm" data-bs-toggle="modal"
                                data-bs-target="#delete-Funcionario<?= $registro['id'] ?>"><i
                                    class='bx bxs-trash'></i></i></button>

                        </td>
                    </tr>
                    <!-- Modal Delete-->
                    <div class="modal fade" id="delete-Funcionario<?= $registro['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form action="deleteFuncionario.php" method="post">
                                                <p>Vc tem certeza que quer excluir o Funcionario:
                                                    <?= $registro['nome'] ?> ??
                                                </p>
                                                <div class="modal-footer" style="justify-content: center;">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Não</button>
                                                    <form action="deleteFuncionario.php" method="post">

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

                            <!-- Modal Update-->
                            <div class="modal fade" id="editar-Funcionario<?= $registro['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar Funcionario</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="updateFuncionario.php" method="post">

                                                <div class="col-md-6">
                                                    <label class="form-label">Nome</label>
                                                    <input type="text" class="form-control" name="nome" id="nome"
                                                        value="<?= $registro['nome'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Valor</label>
                                                    <input type="number" step="0.01" pattern="\d+(\.\d{1,2})?" name="valor"
                                                        id="valor" class="form-control" value="<?= $registro['valor'] ?>">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Descrição</label>
                                                    <input type="text" class="form-control" name="descricao" id="descricao"
                                                        value="<?= $registro['descricao'] ?>">
                                                </div>
                                                <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-success"
                                                data-bs-dismiss="modal">Salvar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal INFO-->
                            <div class="modal fade" id="info-Funcionario<?= $registro['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Informações do Funcionario</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="updateFuncionario.php" method="post">

                                                <div class="col-md-6">
                                                    <label class="form-label"><strong>Nome:   </strong></label>
                                                    <label class="form-label" type="text" name="nome" id="nome"
                                                        ><?= $registro['nome'] ?></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label"><strong>Valor:   </strong></label>
                                                    <label class="form-label" type="number" step="0.01" pattern="\d+(\.\d{1,2})?" name="valor"
                                                        id="valor" ><?= $registro['valor'] ?></label>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Descrição:   </strong></label>
                                                    <label class="form-label" type="text" name="descricao" id="descricao"
                                                        ><?= $registro['descricao'] ?></label>
                                                </div>
                                                <input type="hidden" name="id" id="id" value=" <?= $registro['id'] ?> ">
                                        </div>
                                        
                                        </form>
                                    </div>
                                </div>
                    <?php
                }
                ?>
            </table>


        </ul>


        <!-- Modal Create-->
        <div class="modal fade" id="create-funcionario" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Funcionario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="newFuncionario.php" method="post">

                            <div class="col-md-12">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Telefone</label>
                                <input type="number" name="telefone" id="telefone" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nivel de Acesso</label>
                                <select class="form-select" name="nivel_acesso" id="nivel_acesso">
                                    <option value='1'>Gerente</option>
                                    <option value=''>Funcionario</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Senha</label>
                                <input type="text" name="senha" id="senha" class="form-control">
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>