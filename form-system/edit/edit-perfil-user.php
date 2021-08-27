<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../locked/seguranca.php");
include_once 'proc-edit-system/edit-perfil.php';
include_once 'proc-edit-system/edit-senha.php';

//Executa consulta ...
$consulta_perfil = "SELECT * FROM usuarios WHERE login='$usuariologin'";
$resultado_perfil = $conectar->query($consulta_perfil);
$editar_perfil = mysqli_fetch_assoc($resultado_perfil);
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Usuário</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR USUARIO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 4) {
        echo 'display: none;';
    } ?>">
        <div class="alert alert-danger text-center" id="usuariook" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE
                EDITAR !!!</strong></div>
    </div>

    <div class="row" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
        echo 'display: none;';
    } ?>">
        <div class="col-md-12">
            <ul id="userTab" class="nav nav-tabs">
                <li class="active"><a href="#visaogeral" data-toggle="tab">Visão geral</a></li>
                <li><a href="#profile-settings" data-toggle="tab">Atualizar perfil</a></li>
                <li><a href="#atualizarsenha" data-toggle="tab">Atualizar senha</a></li>
                <li><a href="#atualizarferias" data-toggle="tab">Atualizar férias</a></li>
            </ul>
            <div id="userTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="visaogeral">

                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <p>
                                <?php
                                if (isset($_SESSION['msgperfilerro'])) {
                                    echo $_SESSION['msgperfilerro'];
                                    unset($_SESSION['msgperfilerro']);
                                }
                                if (isset($_SESSION['msgperfil'])) {
                                    echo $_SESSION['msgperfil'];
                                    unset($_SESSION['msgperfil']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['msgsenhaerro'])) {
                                    echo $_SESSION['msgsenhaerro'];
                                    unset($_SESSION['msgsenhaerro']);
                                }
                                if (isset($_SESSION['msgsenha'])) {
                                    echo $_SESSION['msgsenha'];
                                    unset($_SESSION['msgsenha']);
                                }
                                ?>
                            </p>
                            <h2><i class="fa fa-user fa-muted"></i> <?php echo $editar_perfil['nome']; ?></h2><br>
                            <h3>Detalhes do Usuário</h3><br>
                            <p><i class="fa fa-user fa-muted"></i><strong>
                                    Login: </strong><?php echo $editar_perfil['login']; ?></p>
                            <p><i class="fa fa-envelope-o fa-muted"></i><strong>
                                    Email: </strong><?php echo $editar_perfil['email']; ?></p>
                            <p><i class="fa fa-hand-o-right fa-muted"></i><strong>
                                    Status: </strong><?php echo $editar_perfil['status']; ?></p>
                            <p><i class="fa fa-calendar fa-muted"></i><strong> Criado em
                                    : </strong><?php echo dateConvert($editar_perfil['criado']); ?></p>
                            <p><i class="fa fa-globe fa-muted fa-fw"></i> <a href="http://10.47.171.110/sisdamjt/">Sisdam
                                    Web</a>
                            </p>
                            <p><i class="fa fa-phone fa-muted fa-fw"></i><strong>
                                    Tel: </strong><?php echo $editar_perfil['telefone']; ?></p>
                            </p>
                            <br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-settings">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" id="edicao_perfil" method="POST" action="">
                                <div class="form-group"><br>
                                    <div class="col-sm-5">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control"
                                               value="<?php echo $editar_perfil['nome']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label><i class="fa fa-phone fa-fw"></i>Telefone de Contato</label>
                                        <input type="text" name="telefone" class="form-control"
                                               value="<?php echo $editar_perfil['telefone']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label><i class="fa fa-envelope-o fa-fw"></i> Endereço de e-mail</label>
                                        <input type="email" class="form-control" name="email"
                                               value="<?php echo $editar_perfil['email']; ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $usuarioid; ?>">
                                <button type="submit" name="btnEditPerfil" value="EditarPerfil"
                                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span> Atualizar perfil
                                </button>
                                <a href='admin.php?link=2'>
                                    <button type='button' data-toggle="tooltip" title="Cancelar"
                                            class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                                    class="glyphicon glyphicon-remove"></i></span> Cancelar
                                    </button>
                                </a>
                                <br><br><br><br><br><br><br><br><br><br><br>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="atualizarsenha">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" id="edicao_senha" method="POST" action="">
                                <div class="form-group"><br>
                                    <div class="col-sm-5">
                                        <label>Senha Antiga</label>
                                        <input type="password" name="senhaatual" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label>Nova Senha</label>
                                        <input type="password" name="senhanova1" id="senhanova1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label>Repetir Nova Senha</label>
                                        <input type="password" name="senhanova2" id="senhanova2" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $editar_perfil['id']; ?>">
                                <button type="submit" name="btnEditSenha" value="EditarSenha"
                                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span> Atualizar senha
                                </button>
                                <a href='admin.php?link=2'>
                                    <button type='button' data-toggle="tooltip" title="Cancelar"
                                            class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                                    class="glyphicon glyphicon-remove"></i></span> Cancelar
                                    </button>
                                </a>
                                <br><br><br><br><br><br><br><br><br><br><br>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="atualizarferias">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" id="edicao_ferias" method="POST" action="">
                                <div class="form-group"><br>
                                    <div class="col-sm-2">
                                        <label>Início das Férias</label>
                                        <input type="text" class="form-control" data-toggle="tooltip"
                                               title="Não pode ser menor que hoje" name="datanot" id="datanotcad"
                                               placeholder="00/00/0000" value="<?php echo $datanot ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Término das Férias</label>
                                        <input type="text" class="form-control" data-toggle="tooltip"
                                               title="Não pode ser menor que hoje" name="datanot" id="datanotcad"
                                               placeholder="00/00/0000" value="<?php echo $datanot ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <!-- <label>Repetir Nova Senha</label>
                                        <input type="password" name="senhanova2" id="senhanova2" class="form-control"> -->
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $editar_perfil['id']; ?>">
                                <button type="submit" name="btnEditSenha" value="EditarSenha"
                                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span> Atualizar férias
                                </button>
                                <a href='admin.php?link=2'>
                                    <button type='button' data-toggle="tooltip" title="Cancelar"
                                            class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                                    class="glyphicon glyphicon-remove"></i></span> Cancelar
                                    </button>
                                </a>
                                <br><br><br><br><br><br><br><br><br><br><br>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!--row -->
</div> <!-- conteiner -->


