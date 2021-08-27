<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../../seguranca.php';
include_once '../../conecta.php';

$result_sinan_imprimir1via = "SELECT * FROM dengue";
$resultado_sinan_imprimir1via = mysqli_query($conectar, $result_sinan_imprimir1via);

?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <div class="page-header text-center">
        <h3><strong>ENTRADA DE CASOS AEDES - SISDAMJT WEB</strong></h3>
    </div>

    <table id="Listar_Sisdam" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">SINAN</th>
            <th class="text-center">IMPRIMIR</th>
            <th class="text-center">AGRAVO</th>
            <th class="text-center">ENTRADA</th>
            <th class="text-center">SETOR</th>
            <th class="text-center">NOME</th>
            <th class="text-center">DATA1SINT</th>
            <th class="text-center">ENDEREÇO</th>
            <th class="text-center">Nº</th>
            <th class="text-center">RESULTADO</th>
            <th class="text-center">UBS</th>
            <th class="text-center">OBS</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row_sinan_imprimir1via = mysqli_fetch_assoc($resultado_sinan_imprimir1via)){ ?>

        <tr>
            <?php $id = $row_sinan_imprimir1via["id"]; ?>
            <td class="text-center">
                <button type="button" title="EXIBIR DETALHES DO SINAN" class='btn btn-info' data-toggle="modal"
                        data-target="#myModal<?php echo $row_sinan_imprimir1via['id']; ?>"><?php echo $row_sinan_imprimir1via["nDoc"]; ?></button>
            </td>
            <td class="text-center">
                <a href='formulario.php?link=53&id=<?php echo $row_sinan_imprimir1via['id']; ?>' target="_blank">
                    <button style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                        echo 'display: none;';
                    } ?>" type='button' data-toggle="tooltip" title="IMPRIMIR BLOQUEIO"
                            class='btn btn-default'><?php echo $row_sinan_imprimir1via["Impressao"]; ?> <span
                                class="glyphicon glyphicon-print"></button>
                </a>
            </td>
            <td class="text-center"><?php echo $row_sinan_imprimir1via["Agravo"]; ?></td>
            <td class="text-center"><?php echo $row_sinan_imprimir1via["DataEntrada"]; ?></td>
            <td class="text-center"><?php echo $row_sinan_imprimir1via["Setor1"]; ?></td>
            <td class="text-center"><?php echo utf8_encode($row_sinan_imprimir1via["NomeSolicitante"]); ?></td>
            <td class="text-center"><?php echo $row_sinan_imprimir1via["Data1Sintomas"]; ?></td>
            <td class="text-center"><?php echo utf8_encode($row_sinan_imprimir1via["Endereco1"]); ?></td>
            <td class="text-center"><?php echo $row_sinan_imprimir1via["N"]; ?></td>
            <td class="text-center"><?php echo utf8_encode($row_sinan_imprimir1via["Resultado"]); ?></td>
            <td class="text-center"><?php echo utf8_encode($row_sinan_imprimir1via["UBS1"]); ?></td>
            <td class="text-center"><?php echo utf8_encode($row_sinan_imprimir1via["Observacoes"]); ?></td>
        </tr>

        <!-- Inicio Modal Detalhes-->

        <div class="modal fade" id="myModal<?php echo $row_sinan_imprimir1via['id']; ?>" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            <strong>SINAN:&nbsp;&nbsp;<?php echo $row_sinan_imprimir1via['nDoc']; ?></strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label for="inputDataEnt" class="col-sm-2 control-label">ENTRADA:</label>
                            <div class="col-sm-2">
                                &nbsp;<?php echo $row_sinan_imprimir1via['dataentrada']; ?>
                            </div>

                            <label for="inputDoencaNot" class="col-sm-2 control-label">DOENÇA:</label>
                            <div class="col-sm-4">
                                <?php echo $row_sinan_imprimir1via['doencanot']; ?>
                            </div>

                        </div>
                        </br>
                        <div class="row">

                            <label for="inputDataNot" class="col-sm-1 control-label">NOTIF:</label>
                            <div class="col-sm-2">
                                <?php echo $row_sinan_imprimir1via['datanot']; ?>
                            </div>

                            <label for="inputSexo" class="col-sm-1 control-label">SEXO:</label>
                            <div class="col-sm-1">
                                <?php echo $row_sinan_imprimir1via['sexo']; ?>
                            </div>

                            <label for="inputTel" class="col-sm-1 control-label">TEL:</label>
                            <div class="col-sm-2">
                                <?php echo $row_sinan_imprimir1via['tel']; ?>
                            </div>
                        </div>
                        </br>

                        <div class="row">
                            <label for="inputNome" class="col-sm-1 control-label">NOME:</label>
                            <div class="col-sm-8">
                                <?php echo $row_sinan_imprimir1via['nome']; ?>
                            </div>

                            <label for="input1Sint" class="col-sm-1 control-label">IDADE:</label>
                            <div class="col-sm-1">
                                <?php echo $row_sinan_imprimir1via['idade']; ?>
                            </div>
                        </div>
                        </br>

                        <div class="row">
                            <label for="inputLocalAte" class="col-sm-2 control-label">ATENDIDO:</label>
                            <div class="col-sm-9">
                                &nbsp; <?php echo $row_sinan_imprimir1via['localate']; ?>
                            </div>

                        </div>
                        </br>
                        <div class="row">

                            <label for="inputEndereco" class="col-sm-1 control-label">END:</label>
                            <div class="col-sm-6">
                                <?php echo $row_sinan_imprimir1via['rua']; ?>
                            </div>

                        </div>
                        </br>
                        <div class="row">
                            <label for="inputLog" class="col-sm-1 control-label">LOG:</label>
                            <div class="col-sm-2">
                                <?php echo $row_sinan_imprimir1via['log']; ?>
                            </div>

                            <label for="inputNum" class="col-sm-1 control-label">Nº:</label>
                            <div class="col-sm-1">
                                <?php echo $row_sinan_imprimir1via['num']; ?>
                            </div>

                            <label for="inputComp" class="col-sm-1 control-label">COMP:</label>
                            <div class="col-sm-2">
                                <?php echo $row_sinan_imprimir1via['comp']; ?>
                            </div>

                            <label for="inputCep" class="col-sm-1 control-label">CEP:</label>
                            <div class="col-sm-2">
                                <?php echo $row_sinan_imprimir1via['cep']; ?>
                            </div>

                        </div>
                        </br>
                        <div class="row">
                            <label for="inputNum" class="col-sm-2 control-label">BAIRRO:</label>
                            <div class="col-sm-4">
                                <?php echo $row_sinan_imprimir1via['bairro']; ?>
                            </div>
                            <label for="inputCidade" class="col-sm-2 control-label">CIDADE:</label>
                            <div class="col-sm-3">
                                <?php echo $row_sinan_imprimir1via['cidade']; ?>
                            </div>

                        </div>
                        </br>

                        <div class="row">
                            <label for="inputLocalVD" class="col-sm-2 control-label">LOCALVD:</label>
                            <div class="col-sm-4">
                                <?php echo $row_sinan_imprimir1via['localvd']; ?>
                            </div>

                            <label for="inputCidade" class="col-sm-1 control-label">SUVIS:</label>
                            <div class="col-sm-4">
                                <?php echo $row_sinan_imprimir1via['suvis']; ?>
                            </div>
                        </div>
                        </br>

                        <div class="row">
                            <label for="input0" class="col-sm-1 control-label">CRIADO:</label>
                            <div class="col-sm-1">
                                <?php echo $row_sinan_imprimir1via['usuariocad']; ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo dateConvert($row_sinan_imprimir1via["criado"]); ?>
                            </div>
                            <label for="input0" class="col-sm-2 control-label">ALTERADO:</label>
                            <div class="col-sm-1">
                                <?php echo $row_sinan_imprimir1via['usuarioalt']; ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo dateConvert($row_sinan_imprimir1via["alterado"]) ?>
                            </div>

                        </div>
                        </br>


                    </div>

                </div>
            </div>
        </div>
</div>
    </div>
<!-- Fim Modal Detalhes -->


<?php } ?>
</tbody>
</table>
</div>