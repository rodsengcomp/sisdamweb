<?php
error_reporting(0);
?>

<style>
    #mapcad {
        width: 1140px;
        height: 200px;
        border: 10px solid #ccc;;
        margin-bottom: 20px;
    }

    #apresentacao {
        width: 1140px;
        margin: 1% auto;
        overflow: hidden;
    }

    #searchInput {
        background-color: #fff;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 50%;
    }
</style>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Sv2 <?php echo $today = date("Y");   ?> </li>
                </ol>

            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
            echo 'display: none;';
        } ?>" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE CADASTRAR !!!</strong></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';
            } ?>>
                <form class="form-horizontal" id="cad-esporo-animal" method="POST" action="suvisjt.php?pag=proc-cad-esporo-animal">

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center"><strong>CASO DE ESPOROTRICOSE ID : <?php echo $ultimo_id.' - '.$especie.' '.$nomeanimal ?> - GRAVADO COM SUCESSO !!!</strong></div>
                        </div>
                    </div>

                    <div class="form-group" id="apresentacao">
                        <input id="searchInput"  style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle" disabled value="<?php echo $ruagoogle ?>">
                        <div id="mapcad"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputNve" class="col-sm-1 control-label">NVE</label>
                            <div class="col-sm-1"><input type="text" class="form-control" name="nve" disabled value="<?php echo $nve ?>"></div>

                        <label for="inputDataNot" class="col-sm-1 control-label">NOTIFICAÇÃO</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="datanot" disabled value="<?php echo $datanot ?>"></div>

                        <label class="col-sm-1 control-label">ANIMAL</label>
                            <div class="col-sm-3"><input type="text" class="form-control" name="nomeanimal" disabled value="<?php echo $nomeanimal ?>"></div>

                        <label class="col-sm-1 control-label">ESPÉCIE</label>
                            <div class="col-sm-2"><input type="text" class="form-control especie" name="especie" disabled value="<?php echo $especie ?>"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">TUTOR</label>
                            <div class="col-sm-5"><input type="text"  class="form-control" name="tutor" disabled value="<?php echo $tutor ?>"></div>

                        <label for="inputTelefone1" class="col-sm-1 control-label">TEL 1</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="tel1" disabled value="<?php echo $tel1 ?>"></div>

                        <label for="inputTelefone2" class="col-sm-1 control-label">TEL 2</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="tel2" disabled value="<?php echo $tel2 ?>"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">SITUAÇÃO</label>
                            <div class="col-sm-2"><input type="text"  class="form-control" name="situacao" disabled value="<?php echo $situacao ?>"></div>

                        <label class="col-sm-1 control-label">ENDEREÇO</label>
                            <div class="col-sm-3"><input type="text" class="form-control rua" name="rua" disabled value="<?php echo $rua ?>"></div>

                        <label class="col-sm-1 control-label">N</label>
                            <div class="col-sm-1"><input type="text" class="form-control" name="num" disabled value="<?php echo $num ?>"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="comp" disabled value="<?php echo $comp ?>"></div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">LAT/LNG</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="lat" disabled value="<?php echo $lat ?>"></div>
                            <div class="col-sm-2"><input type="text" class="form-control" name="lng" disabled value="<?php echo $lng ?>"></div>

                        <label class="col-sm-1 control-label">CEP</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="cep" disabled value="<?php echo $cep ?>"></div>

                        <label class="col-sm-1 control-label">BAIRRO</label>
                            <div class="col-sm-3"><input type="text" class="form-control" name="bairro" disabled value="<?php echo $bairro ?>"></div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">LOG</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="log" disabled value="<?php echo $log ?>"></div>

                        <label class="col-sm-1 control-label">DA/SET</label>
                            <div class="col-sm-1"><input type="text" id="da" class="form-control" name="da" disabled value="<?php echo $da ?>"></div>
                            <div class="col-sm-4"><input type="text" class="form-control" name="setor" disabled value="<?php echo $setor ?>"></div>

                        <label for="inputPagGuia" class="col-sm-1 control-label">PGGUIA</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="pgguia" disabled value="<?php echo $pgguia ?>"></div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-5"><input type="text" class="form-control" name="localvd" disabled value="<?php echo $ubs ?>"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">MEDICAMEN.</label>
                        <div class="col-sm-3"><input type="text" class="form-control" name="medicamento" disabled value="<?php echo $med ?>"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">DOSAGEM</label>
                        <div class="col-sm-1"><input type="number" class="form-control" name="dsg" disabled value="<?php echo $dsg ?>"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">OBS</label>
                        <div class="col-sm-6"><textarea class="form-control" name="obs" rows="1" disabled><?php echo $obs ?></textarea></div>
                    </div>

                    <div class="form-group">
                        <label for="inputDataEntrada" class="col-sm-1 control-label">1ªMEDC</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="dataentrada1" disabled value="<?php echo $dtent?>"></div>
                        <label for="inputDoseQtd" class="col-sm-1 control-label">DOSAGEM</label>
                            <div class="col-sm-1"><input type="number" class="form-control" name="qtd1" disabled value="<?php echo $qtd1 ?>"></div>
                        <label for="inputEntrega" class="col-sm-1 control-label">ENTREG.</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="nment1"  disabled value="<?php echo $nment1 ?>"></div>
                        <label for="inputDataEntrada" class="col-sm-1 control-label">QTD</label>
                        <div class="col-sm-3"><input type="text" class="form-control" name="nmrecp1" disabled value="<?php echo $nmrecep1 ?>"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputDataEntrada2" class="col-sm-1 control-label">2ªMEDC</label>
                        <div class="col-sm-2"><input type="text" class="form-control" name="dataentrada2" disabled value="<?php echo $dtent2?>"></div>
                        <label for="inputDoseQtd2" class="col-sm-1 control-label">QTD</label>
                        <div class="col-sm-1"><input type="number" class="form-control" name="qtd2" disabled value="<?php echo $qtd2 ?>"></div>
                        <label for="inputEntrega2" class="col-sm-1 control-label">ENTREG.</label>
                        <div class="col-sm-2"><input type="text" class="form-control" name="nment2"  disabled value="<?php echo $nment2 ?>"></div>
                        <label for="inputDataEntrada2" class="col-sm-1 control-label">RECEP.</label>
                        <div class="col-sm-3"><input type="text" class="form-control" name="nmrecp2" disabled value="<?php echo $nmrecep2 ?>"></div>
                    </div>


        <div class="form-group text-center">
            <div class="col-sm-12">
                <a href='suvisjt.php?pag=cad-espo-animal' role='button' accesskey="S" data-toggle="tooltip" title="NOVO REGISTRO ESPOROTRICOSE ANIMAL"
                   class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span><u>N</u>OVO&nbsp;&nbsp;</a>

                <a href='suvisjt.php?pag=listar-esporotricose-animal' role='button' title="LISTAR REGISTROS" accesskey="L"
                   class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                            class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                <a target="_blank"
                   href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                   role='button' title="BUSCA CEP CORREIOS" accesskey="S"
                   class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                            src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>
            </div>
        </div>
        </form>
        </fieldset>
    </div>
</div>
</div> <!-- /container -->

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>
