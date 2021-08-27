<?php
include_once '../../locked/seguranca-admin.php';
include_once '../../conecta.php';
include_once 'functions.php';

$result_tid = "SELECT * FROM tid";
$resultado = $conectar->query($result_tid);
$agora=date('d/m/Y');
?>


<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Tid em Aberto <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span> TID EM ABERTO - <?php echo $today = date("Y");   ?></button>
            </div>

            <div class="alert alert-danger text-center" role="alert" style="<?php if ($_SESSION['usuarioTid'] <> 0) {
                echo 'display: none;';} ?>"><strong>USUÁRIO SEM PERMISSÃO PARA ACESSAR LISTA TID EM ABERTO <?php echo $today = date("Y"); ?> !!!</strong></div>

            <?php
            if (isset($_SESSION['msgdelerro'])) {
                echo $_SESSION['msgdelerro'];
                unset($_SESSION['msgdelerro']);
            }
            if (isset($_SESSION['msgdel'])) {
                echo $_SESSION['msgdel'];
                unset($_SESSION['msgdel']);
            }
            if (isset($_SESSION['msgedit'])) {
                echo $_SESSION['msgedit'];
                unset($_SESSION['msgedit']);
            }
            ?>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="text-center">
            <div id="noprint"><a href="suvisjt.php?pag=cad-tid" role="button" class="btn btn-labeled btn-success"
                        style="<?php if ($_SESSION['usuarioTid'] == 0) {
                            echo 'display: none;';
                        } ?>" accesskey="N" data-toggle="tooltip" title="CADASTRAR NOVO"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span> <u> N</u>OVO</a></div>
        </div>
    </div>

    <table id="list-tid-aberto" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%" style="<?php if ($_SESSION['usuarioTid'] == 0) {
        echo 'display: none;';
    } ?>">
        <thead>
        <tr>
            <th class="text-center">Nº TID</th>
            <th class="text-center"><span class="glyphicon glyphicon-pencil"></th>
            <th class="text-center">ENTRADA</th>
            <th class="text-center">DIAS</th>
            <th class="text-center">TIPO</th>
            <th class="text-center">IDENTIFICAÇÃO</th>
            <th class="text-center">ASSUNTO</th>
            <th class="text-center">DESCRIÇÃO</th>
            <th class="text-center">ORG.ORIGEM</th>
            <th class="text-center">UN.ORIGEM</th>
            <th class="text-center">UNI.DESTINO</th>
            <th class="text-center">TRAMITADO</th>
            <th class="text-center">CAD. POR</th>
            <th class="text-center">CAD. EM</th>
            <th class="text-center">TEC. RESP.</th>
            <th class="text-center">UN. ENTRADA</th>
            <th class="text-center">LIB. POR</th>
            <th class="text-center">LIB. EM</th>
            <th class="text-center">ALT. POR</th>
            <th class="text-center">ALT. EM</th>
        </tr>
        </thead>
        <tbody style="<?php if ($_SESSION['usuarioTid'] == 0) {
            echo 'display: none;';
        } ?>">

        <?php while ($row_tid = mysqli_fetch_assoc($resultado)){ ?>
        <tr style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
            echo 'display: none;';
        } ?>">
            <?php $id = $row_tid["id"]; ?>
            <td class="text-center"><?php echo $row_tid["ndoc"];?>
            <td class="text-center">
                <div id="noprint"><a href='suvisjt.php?pag=edit-tid&id=<?php echo $row_tid["id"];?>' style="<?php if ($_SESSION['usuarioLogin'] == '') {
                    echo 'display: none;';
                } ?>" type='button' data-toggle="tooltip" title="Editar TID"
                    class='btn btn-warning btn-circle'><span class="glyphicon glyphicon-pencil"></a></div>
            </td>
            <td class="text-center"><?php echo $row_tid["dataentrada"];?>
            </td>
            <td class="text-center"><?php $diferenca = geraTimestamp(date('d/m/Y'))-geraTimestamp($row_tid["datatramitacao"]);
                $dias = floor($diferenca / (60 * 60 * 24));
                echo $colordia = completeResultDia($dias).$dias;?></td>
            <td class="text-center"><?php echo $row_tid["tipo"]; ?></td>
            <td class="text-center"><?php echo $row_tid["identificacao"]; ?></td>
            <td class="text-center"><?php echo $row_tid["assunto"]; ?></td>
            <td class="text-center"><?php echo $row_tid["descricao"]; ?></td>
            <td class="text-center"><?php echo $row_tid["orgorigem"]; ?></td>
            <td class="text-center"><?php echo $row_tid["uniorigem"]; ?></td>
            <td class="text-center"><?php echo $row_tid["unidestino"]; ?></td>
            <td class="text-center"><?php echo $row_tid["datatramitacao"];?>
            <td class="text-center"><?php echo $row_tid["usuariocad"]; ?></td>
            <td class="text-center"><?php echo date('d/m/Y',strtotime($row_tid["criado"])); ?></td>
            <td class="text-center"><?php echo $row_tid["tecnico_rec"]; ?></td>
            <td class="text-center"><?php echo $row_tid["unientrada"]; ?></td>
            <td class="text-center"><?php echo $row_tid["usuariosaida"]; ?></td>
            <td class="text-center"><?php echo date('d/m/Y',strtotime($row_tid["datasaida"])); ?></td>
            <td class="text-center"><?php echo $row_tid["usuarioalt"]; ?></td>
            <td class="text-center"><?php echo date('d/m/Y',strtotime($row_tid["alterado"])); ?></td>
        </tr>

        <?php } ?>
        <br>
        </tbody>
    </table>
</div>
