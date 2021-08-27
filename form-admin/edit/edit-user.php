<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../locked/seguranca-admin.php");
include_once 'proc-edit-admin/proc-edit-user.php';

//Captura de ID
$id = $_GET['id'];

//Executa consulta
$consulta_usuario = "SELECT * FROM usuarios WHERE id='$id'";
$resultado_usuario = $conectar->query($consulta_usuario);
$editar_usuario = mysqli_fetch_assoc($resultado_usuario);

?>

    <div class="container theme-showcase" role="main">

        <div class="page-content">

            <!-- Página de Título -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="admin.php">Painel de Controle</a></li>
                            <li class="active">Edição de Usuário <?php echo $today = date("Y");   ?></li>
                        </ol>
                        <button type="button" class="btn btn-labeled btn-warning btn-lg btn-block"><span class="btn-label"><i
                                        class="glyphicon glyphicon-pencil"></i></span>EDITAR MEMORANDOS E OFÍCIOS <?php echo $today = date("Y");   ?></button>
                        <?php
                        if (isset($_SESSION['msgerro'])) {
                            echo $_SESSION['msgerro'];
                            unset($_SESSION['msgerro']);
                        }
                        ?>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- Fim da Página de Título -->

            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" id="edicao_usuario" method="POST" action="">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputNome">Nome</label>
                                <input type="text" value="<?php echo $editar_usuario['nome']; ?>" data-toggle="tooltip"
                                       title="Ex: Ana Paula" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="nome" placeholder="NOME, SOBRENOME" id="nome"
                                       onchange="upperCaseF(this)" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputEmail">E-mail</label>
                                <input type="email" value="<?php echo $editar_usuario['email']; ?>"
                                       title="Digite um email válido"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" class="form-control" name="email" placeholder="exemplo@exemplo.com.br">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputUsuario">Login</label>
                                <input type="text" value="<?php echo $editar_usuario['login']; ?>" data-toggle="tooltip"
                                       title="Ex: D788796" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" id="login" name="login" placeholder="D123456 " onchange="upperCaseF(this)">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="inputnivel_de_acesso">Nível de Acesso</label>
                                <select class="form-control" data-toggle="tooltip" title="Ex: USUÁRIO"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" name="nivel_de_acesso">
                                    <option value="0"
                                        <?php
                                        if ($editar_usuario['nivel_acesso_id'] == 0) {
                                            echo 'selected';
                                        }
                                        ?>
                                    >INATIVO
                                    </option>
                                    <option value="1"
                                        <?php
                                        if ($editar_usuario['nivel_acesso_id'] == 1) {
                                            echo 'selected';
                                        }
                                        ?>
                                    >ADMINISTRATIVO
                                    </option>
                                    <option value="2"
                                        <?php
                                        if ($editar_usuario['nivel_acesso_id'] == 2) {
                                            echo 'selected';
                                        }
                                        ?>
                                    >AVANÇADO
                                    </option>
                                    <option value="3"
                                        <?php
                                        if ($editar_usuario['nivel_acesso_id'] == 3) {
                                            echo 'selected';
                                        }
                                        ?>
                                    >USUÁRIO
                                    </option>
                                    <option value="4"
                                        <?php
                                        if ($editar_usuario['nivel_acesso_id'] == 4) {
                                            echo 'selected';
                                        }
                                        ?>
                                    >VISITANTE
                                    </option>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label for="inputStatus">Status</label>
                                <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" name="status">
                                    <option value="INATIVO"
                                        <?php if ($editar_usuario['status'] == 'INATIVO') {
                                            echo 'selected';
                                        } ?>
                                    >INATIVO
                                    </option>
                                    <option value="ATIVO"
                                        <?php if ($editar_usuario['status'] == 'ATIVO') {
                                            echo 'selected';
                                        } ?>
                                    >ATIVO
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputStatus">Acesso Tid</label>
                                <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" name="acessotid">
                                    <option value="0"
                                        <?php
                                        if ($editar_usuario['acessotid'] == 0) {
                                            echo 'selected';
                                        }
                                        ?>
                                    >NAO
                                    </option>
                                    <option value="1"
                                        <?php
                                        if ($editar_usuario['acessotid'] == 1) {
                                            echo 'selected';
                                        }
                                        ?>
                                    >SIM
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="hidden" name="usuario_edit" value="<?php echo $usuariologin; ?>">
                                <input type="hidden" name="id" value="<?php echo $editar_usuario['id']; ?>">
                                <button type="submit" name="btnEditUsuario" value="Editar" accesskey="G"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='././admin.php'
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                        class="btn btn-labeled btn-info"><span class="btn-label"><i
                                                class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR
                                </button>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='././admin.php'
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                                        class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                                class="glyphicon glyphicon-remove"></i></span> <u>S</u>AIR
                                </button>
                                </a>
                            </div>
                        </div>
                        <br>

                    </form>
                </div> <!-- col-lg-12-->
            </div> <!-- row -->
        </div> <!-- page-content-->
<!--    </div> --> <!-- page-wrapper-->
</div> <!-- container-fluid-->

