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

$result_contato_nomes = "SELECT * FROM contatos";
$resultado_contato_nomes = mysqli_query($conectar, $result_contato_nomes);

$conectar->close();

?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <div class="page-header text-center">
        <h3><strong>AGENDA DE CONTATOS - SUVIS JAÇANÃ-TREMEMBÉ</strong></h3>
    </div>

    <div class="row espaco">
        <div class="text-center">
            <a href="formulario.php?link=67">
                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                    echo 'display: none;';
                } ?>" accesskey="N" data-toggle="tooltip" title="NOVO CONTATO" class="btn btn-success"><span
                            class="glyphicon glyphicon-plus-sign"></span> <u> N</u>OVO
                </button>
            </a>
        </div>
    </div>

    <table id="Listar_Sisdam" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">EDITAR</th>
            <th class="text-center">DETALHE</th>
            <th class="text-center">PREFIXO</th>
            <th class="text-center">NOME</th>
            <th class="text-center">SOBRENOME</th>
            <th class="text-center">SUFIXO</th>
            <th class="text-center">TEL 1</th>
            <th class="text-center">TEL 2</th>
            <th class="text-center">EMAIL</th>
            <th class="text-center">???</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row_contato_nomes = mysqli_fetch_assoc($resultado_contato_nomes)){ ?>
        <tr>
            <td class="text-center"><?php echo utf8_encode($row_contato_nomes["id"]); ?></td>
            <?php $id = $row_contato_nomes["id"]; ?>
            <td class="text-center">
                <a href='formulario.php?link=71&id=<?php echo $row_contato_nomes['id']; ?>'>
                    <button style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                        echo 'display: none;';
                    } ?>" type='button' data-toggle="tooltip" title="EDITAR CONTATO" class='btn btn-warning'><span
                                class="glyphicon glyphicon-pencil"></button>
                </a>
            </td>
            <td class="text-center">
                <button type="button" class='btn btn-success' data-toggle="modal"
                        data-target="#myModal1<?php echo $row_contato_nomes['id']; ?>"><span
                            class="glyphicon glyphicon-user"></span></a></button>
            </td>
            <td class="text-center"><?php echo $row_contato_nomes["prefixo"]; ?></td>
            <td class="text-center"><?php echo $row_contato_nomes["nome"]; ?></td>
            <td class="text-center"><?php echo $row_contato_nomes["sobrenome"]; ?></td>
            <td class="text-center"><?php echo $row_contato_nomes["sufixo"]; ?></td>
            <td class="text-center"><?php echo $row_contato_nomes["tel1"]; ?></td>
            <td class="text-center"><?php echo $row_contato_nomes["tel2"]; ?></td>
            <td class="text-center"><?php echo $row_contato_nomes["email"]; ?></td>
            <td class="text-center">
                <button type="button" class='btn btn-danger' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                    echo 'display: none;';
                } ?>" data-toggle="modal" data-target="#myModal<?php echo $row_contato_nomes['id']; ?>"><span
                            class="glyphicon glyphicon-trash"></span></button>
            </td>
        </tr>

        <!-- Inicio Modal Detalhes-->

        <div class="modal fade" id="myModal<?php echo $row_contato_nomes['id']; ?>" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="text-center">
                                <h4>Deseja apagar o</h4>
                                <h4>Contato: <?php echo $row_contato_nomes["nome"] ?> ? </h4>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="text-center">
                            <a href='formulario.php?link=72&id=<?php echo $row_contato_nomes['id']; ?>'>
                                <button type="button" class="btn btn-success">SIM</button>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Fim Modal Detalhes -->

<!-- Inicio Modal Detalhes-->

    <div class="modal fade" id="myModal1<?php echo $row_contato_nomes['id']; ?>" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">
                        <strong><?php echo $row_contato_nomes['nome']; ?>
                            &nbsp;&nbsp;<?php echo $row_contato_nomes['sobrenome']; ?></strong></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h4 class="modal-title text-center"><strong><?php echo $row_contato_nomes['sufixo']; ?>
                                - <?php echo $row_contato_nomes['prefixo']; ?></label></strong></h4>
                    </div>
                    </br>
                    </br>

                    <div class="row">
                        <label for="inputDataNot" class="col-sm-3 control-label">TELEFONES:</label>
                        <div class="col-sm-4">
                            <?php echo $row_contato_nomes['tel1']; ?>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $row_contato_nomes['tel2']; ?>
                        </div>
                    </div>
                    </br>

                    <div class="row">
                        <label for="inputDataNot" class="col-sm-3 control-label">EMAIL:</label>
                        <div class="col-sm-4">
                            <?php echo $row_contato_nomes['email']; ?>
                        </div>
                    </div>
                    </br>

                    <div class="row">
                        <label for="input0" class="col-sm-2 control-label">CRIADO:</label>
                        <div class="col-sm-1">
                            <?php echo $row_contato_nomes['usuariocad']; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo dateConvert($row_contato_nomes["criado"]); ?>
                        </div>
                        <label for="input0" class="col-sm-2 control-label">ALTERADO:</label>
                        <div class="col-sm-1">
                            <?php echo $row_contato_nomes['usuarioalt']; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo dateConvert($row_contato_nomes["alterado"]) ?>
                        </div>

                    </div>
                    </br>


                    <div class="row">
                        <div class="text-center">
                            <a href='formulario.php?link=67'>
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="NOVO CONTATO" class="btn btn-success"><span
                                            class="glyphicon glyphicon-plus-sign"></button>
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href='formulario.php?link=71&id=<?php echo $row_contato_nomes['id']; ?>'>
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="EDITAR CONTATO" class="btn btn-warning"><span
                                            class="glyphicon glyphicon-pencil"></button>
                            </a>&nbsp;&nbsp;&nbsp;
                            <button type="button" data-dismiss="modal" data-toggle="tooltip" title="SAIR"
                                    class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                        </div>
                    </div>
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