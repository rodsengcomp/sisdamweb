<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

include_once '../../locked/seguranca-admin.php';
include_once '../../conecta.php';
include_once 'proc-cad-admin/proc-cad-user.php';
?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-5">
                    <div class="page-title">
                        <h2>
                            Cadastro de Usuário
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="admin.php">Painel de Controle</a>
                            </li>
                            <li class="active">Cadastro de Usuário</li>
                        </ol>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        if (isset($_SESSION['msgcad'])) {
                            echo $_SESSION['msgcad'];
                            unset($_SESSION['msgcad']);
                        }
                        ?>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- end PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" id="cadastro_usuario" method="POST" action="">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputNome">Nome</label>
                                <input type="text" data-toggle="tooltip" title="Ex: Ana Paula" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="nome" placeholder="NOME, SOBRENOME" id="nome"
                                       onchange="upperCaseF(this)" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputEmail">E-mail</label>
                                <input type="email" title="Digite um email válido"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" class="form-control" name="email" placeholder="exemplo@exemplo.com.br">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputUsuario">Login</label>
                                <input type="text" data-toggle="tooltip" title="Ex: D788796" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" id="login" name="login" placeholder="D123456 " onchange="upperCaseF(this)">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputSenha">Senha</label>
                                <input type="password" data-toggle="tooltip" title="Ex: ddd123" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="senha" value="mudar123" placeholder="******">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="inputNivelAcesso">Nível de Acesso</label>
                                <select class="form-control" data-toggle="tooltip" title="Ex: USUÁRIO"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" name="nivel_de_acesso">
                                    <option value="0">INATIVO</option>
                                    <option value="1">ADMINISTRADOR</option>
                                    <option value="2">AVANÇADO</option>
                                    <option value="3">USUÁRIO</option>
                                    <option value="4">VISITANTE</option>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label for="inputStatus">Status</label>
                                <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" name="status">
                                    <option value="INATIVO">INATIVO</option>
                                    <option value="ATIVO">ATIVO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputStatus">Acesso Tid</label>
                                <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" name="status">
                                    <option value="0">NAO</option>
                                    <option value="1">SIM</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" type="submit" name="btnCadUsuario" value="Cadastrar" accesskey="G"
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
                    </form>
                </div> <!-- col-lg-12-->
            </div> <!-- row -->
        </div> <!-- page-content-->
    </div> <!-- page-wrapper-->
</div> <!-- container-fluid-->

