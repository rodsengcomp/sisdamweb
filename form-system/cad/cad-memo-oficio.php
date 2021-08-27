<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<script type="application/javascript">
    var teste = document.getElementById("teste");
    teste.addEventListener("input", function (event) {
        event.target.value = foldToASCII(event.target.value).toUpperCase();
    });
</script>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Memorandos/Ofícios <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR MEMO/OFÍCIO <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($today = date("Y") == $today = date("Y")) {
            echo 'display: none;'; } ?>" role="alert"><strong>PERMISSÃO PARA CADASTRAR APENAS EM <?php echo $today = date("Y"); ?>!!!</strong></div>
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
                <form class="form-horizontal" id="cad-memo" method="POST" action="suvisjt.php?pag=proc-cad-memo-oficio">

                    <div class="form-group">
                        <label for="inputNumero" class="col-sm-3 control-label">Nº</label>
                        <div class="col-sm-2">
                            <input type="text" readonly data-toggle="tooltip" title="NÚMERO DE MEMORANDO OU OFICIO"
                                   class="form-control text-center" placeholder="00">
                        </div>

                        <label for="inputDataMemo" class="col-sm-2 control-label">DATA</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control" data-toggle="tooltip"
                                   title="DATA DO MEMORANDO OU OFÍCIO" required name="datamemo" id="datamemocad"
                                   placeholder="00/00/0000" value="<?php echo $today = date("d-m-Y");   ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDa" class="col-sm-3 control-label">TIPO</label>
                        <div class="col-sm-6">
                            <input type="text" autofocus data-toggle="tooltip" data-placement="top" title="Ex: MEMORANDO, OFÍCIO" id="tipo"
                                   class="form-control tipo" name="tipo" placeholder="MEMO,OFICIO">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDestino" class="col-sm-3 control-label">DESTINO</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-toggle="tooltip" data-placement="top"
                                   title="EX: CCZ, CRSN, UBS ..." id="teste" required name="localdestino"
                                   placeholder="LOCAL / PESSOA" onchange="upperCaseF(this)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDescricao" class="col-sm-3 control-label">DESCRIÇÃO</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-toggle="tooltip" data-placement="top"
                                   title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..." required name="descricaomemo"
                                   id="descricaocad" placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...."
                                   onchange="upperCaseF(this)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputNome" class="col-sm-3 control-label">SOLICITANTE</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control nomecad" data-toggle="tooltip" data-placement="top"
                                   title="EX: WALLACE RAUL MARTINS" required name="nomememo"
                                   id="nomecad" placeholder="NOME DO SOLICITANTE" onchange="upperCaseF(this)">
                        </div>
                    </div>
            </fieldset>

            <div class="form-group text-center">
                <div class="col-md-12">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                        echo 'display: none;';
                    } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success btn-primary mb-2 mr-sm-4">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                    </button>
                    <a href='suvisjt.php?pag=list-memo-oficio' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
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
