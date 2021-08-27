<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Tid em Aberto <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR TID/SIMPROC <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioTid'] <> 0) {
            echo 'display: none;';
        } ?>" role="alert"><strong>USUÁRIO SEM PERMISSÃO PARA CADASTRAR TID <?php echo $today = date("Y"); ?> !!!</strong></div>
    </div>

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> "") {
            echo 'display:none';
        } ?>" role="alert"><strong>PARA CADASTRAR É NECESSARIO FAZER O LOGIN!!!</strong></div>
    </div>

    <div class="row">
        <div class="col-md-12" style="<?php if ($_SESSION['usuarioTid'] == 0) {echo 'display: none;'; } ?>">
            <form class="form-horizontal" id="cad-tid" method="POST" action="suvisjt.php?pag=proc-cad-tid">

            <div class="form-group">
                <!--readonly para bloquear input-->
                <label for="inputDataTid" class="col-sm-1 control-label">ENTRADA</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" data-toggle="tooltip"
                           title="DATA DE ENTRADA DO TID" required name="datatid" id="datatid"
                           placeholder="00/00/0000" value="<?php echo $today = date("d/m/Y");   ?>">
                </div>

                <label for="inputNTid" class="col-sm-1 control-label">Nº TID</label>
                <div class="col-sm-2">
                    <input type="text" autofocus class="form-control" data-toggle="tooltip"
                           title="NUMERO DO TID" name="ntid" id="ntid"
                           placeholder="0000000">
                </div>

                <label for="inputDa" class="col-sm-1 control-label">TIPO</label>
                <div class="col-sm-5">
                    <input type="text" data-toggle="tooltip" title="Ex: MEMORANDO, OFÍCIO" id="tipotid"
                           class="form-control tipotid" name="tipotid" placeholder="MEMO,OFICIO" onchange="upperCaseF(this)">
                </div>
            </div>

            <div class="form-group">
                <label for="inputNome" class="col-sm-1 control-label">SETOR</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control unientrada" data-toggle="tooltip"
                           title="EX: AMBIENTAL ..." required name="unientrada"
                           id="unientrada" placeholder="AMBIENTAL, EPIDEMIO, RH, SANITARIA ..." onchange="upperCaseF(this)">
                </div>

                <label for="inputIdentificacao" class="col-sm-2 control-label">IDENTIFICAÇÃO</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" data-toggle="tooltip"
                           title="EX: OFICIO Nº 30/2018 PROC 2922/17, ETC ...." required name="identificacaotid"
                           id="identificacaotid" placeholder="EX: OFICIO Nº 30/2018 PROC 2922/17, ETC ...."
                           onchange="upperCaseF(this)">
                </div>
                <label for="inputDataTram" class="col-sm-1 control-label">TRAMITAÇÃO</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" data-toggle="tooltip"
                           title="DATA DA TRAMITAÇÃO" required name="datatram" id="datatram"
                           placeholder="00/00/0000">
                </div>
            </div>

                <div class="form-group">
                    <label for="inputDestino" class="col-sm-1 control-label">ORG.ORIG</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control orgorigem" data-toggle="tooltip"
                               title="EX: 11 - SGM - SECRETARIA DO GOVERNO MUNICIPAL" required name="orgorigem" id="orgorigem"
                               placeholder="ÓRGÃO DE ORIGEM DO TID" onchange="upperCaseF(this)">
                    </div>

                    <label for="inputDa" class="col-sm-1 control-label">UN.ORIGEM</label>
                    <div class="col-sm-5">
                        <input type="text" data-toggle="tooltip" title="EX: 180105 UVIS SANTANA/TUCURUVI ..." id="uniorigem"
                               class="form-control uniorigem" name="uniorigem" placeholder="UNIDADE DE ORIGEM DO TID">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDestino" class="col-sm-1 control-label">ASSUNTO</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control assuntotid" data-toggle="tooltip"
                               title="EX: MEMORANDO, OFÍCIO ..." required name="assuntotid" id="assuntotid"
                               placeholder="LOCAL / PESSOA" onchange="upperCaseF(this)">
                    </div>

                    <label for="inputDestino" class="col-sm-1 control-label">DESTINO</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control unidestino" data-toggle="tooltip"
                               title="EX: 182832 UVIS JACANA" required name="unidestino" id="unidestino"
                               placeholder="UNIDADE DE DESTINO DO TID" onchange="upperCaseF(this)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDescricao" class="col-sm-1 control-label">DESCRIÇÃO</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" data-toggle="tooltip"
                               title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..." required name="descricaotid"
                               id="descricaotid" placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...."
                               onchange="upperCaseF(this)">
                    </div>
                    <label for="inputNome" class="col-sm-2 control-label">RESPONSAVEL</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control nomecad" data-toggle="tooltip"
                               title="EX: LUCIANA CRISTINE DE AZEVEDO RIBEIRO" required name="resptid"
                               id="resptid" placeholder="NOME DO TÉCNICO RESPONSÁVEL" onchange="upperCaseF(this)">
                    </div>
                </div>

                <div class="form-group text-center">
                    <div class="col-sm-12">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                        echo 'display: none;';
                    } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                    </button>
                    <a href='suvisjt.php?pag=list-tid-aberto' type='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                            class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                    class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                    <a href='suvisjt.php' type='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                            class="btn btn-labeled btn-danger mb-2 mr-sm-4"><span class="btn-label"><i
                                    class="glyphicon glyphicon-remove"></i></span> <u>S</u>AIR</a>
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>