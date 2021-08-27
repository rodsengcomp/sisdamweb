<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../locked/seguranca.php';
include_once '../../../conecta.php';

// $ano_cad = "SELECT anocad FROM ano ";


?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Entrada de Materiais <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR ENTRADA <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <?php
    if (isset($_SESSION['msgdelerro'])) {
        echo $_SESSION['msgdelerro'];
        unset($_SESSION['msgdelerro']);
    }
    if (isset($_SESSION['msgdel'])) {
        echo $_SESSION['msgdel'];
        unset($_SESSION['msgdel']);
    }
    if (isset($_SESSION['msgerro'])) {
        echo $_SESSION['msgerro'];
        unset($_SESSION['msgerro']);
    }
    if (isset($_SESSION['msgedit'])) {
        echo $_SESSION['msgedit'];
        unset($_SESSION['msgedit']);
    }
    ?>

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($today = date("Y") == 2019) {
            echo 'display: none;'; } ?>" role="alert"><strong>PERMISSÃO PARA CADASTRAR APENAS EM 2018!!!</strong></div>
    </div>
    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> "") {
            echo 'display:none';
        } ?>" role="alert"><strong>PARA CADASTRAR É NECESSARIO FAZER O LOGIN!!!</strong></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';
            } ?>>
                <form class="form-horizontal" id="cad-material" method="POST" action="suvisjt.php?pag=proc-cad-entrada-material">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">MATERIAL</label>
                        <div class="col-sm-6">
                            <input type="text" autofocus data-toggle="tooltip" data-placement="top" title="Ex: LUVA AMARELA G (PAR)" id="material"
                                   class="form-control material" name="material" placeholder="LUVA AMARELA G (PAR)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">QTD</label>
                        <div class="col-sm-2">
                            <input type="number" name="qtd" data-toggle="tooltip" title="1 ou 2 ..." class="form-control text-center" placeholder="1">
                        </div>

                        <label for="inputDataMemo" class="col-sm-2 control-label">ENTRADA</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control" data-toggle="tooltip" title="DATA DE ENTRADA" name="entrada"
                                   placeholder="00/00/0000" value="<?php echo $today = date("d/m/Y");   ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDestino" class="col-sm-3 control-label">Nº MEMO</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control verifica_memo" data-toggle="tooltip" data-placement="top"
                                   title="EX: 1, 26 ou 158 ..." id="verifica_memo" name="verifica_memo"
                                   placeholder="1, 26 ou 158 ...">
                        </div>

                        <div class="col-sm-3">
                            <input type="text" class="form-control" data-toggle="tooltip" data-placement="top"
                                   title="EX: 1, 26 ou 158 ..." disabled  placeholder="/<?php echo $today = date("Y"); ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputDescricao" class="col-sm-3 control-label">OBSERVAÇÃO</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="2" data-toggle="tooltip" data-placement="top" title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..."
                                  name="observacao" placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...." onchange="upperCaseF(this)"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputNome" class="col-sm-3 control-label">CADASTRADO</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-toggle="tooltip" data-placement="top"
                                   title="EX: ELIANA COLLUCCI" readonly name="nomecad" value="<?php echo $usuarionome ?>">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" readonly data-toggle="tooltip" data-placement="top"
                                   title="EX: 7887965" name="nomerf" value="<?php echo substr($usuariologin,1,6); ?>">
                        </div>
                    </div>
                    <input type="hidden" name="formulario" value="CADASTRO">
            </fieldset>

            <div class="form-group text-center">
                <div class="col-md-12">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                        echo 'display: none;';
                    } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success btn-primary mb-2 mr-sm-4">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                    </button>
                    <a href='suvisjt.php?pag=list-entrada-material' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                       class="btn btn-labeled btn-info btn-primary mb-2 mr-sm-4"><span class="btn-label"><i
                                    class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                    <a href='suvisjt.php' role='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                       class="btn btn-labeled btn-danger btn-primary mb-2 mr-sm-4"><span class="btn-label"><i
                                    class="glyphicon glyphicon-remove"></i></span></i></span> <u>S</u>AIR</a>
                    <button type="button" class='btn btn-danger btn-primary mb-2 mr-sm-4'
                            style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                echo 'display: none;';
                            } ?>" data-toggle="modal" data-target="#myModal<?php echo $editar_memo['id']; ?>">
                        <span class="glyphicon glyphicon-trash"></span></button>
                </div>
            </div>

                </form>
            </fieldset>
        </div>
    </div>
</div>
