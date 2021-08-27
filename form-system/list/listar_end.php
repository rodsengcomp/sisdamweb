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

$result_rua_nomes = "SELECT * FROM ruas";
$resultado_rua_nomes = mysqli_query($conectar, $result_rua_nomes);

$conectar->close();

?>

<div class="container-fluid" role="main">
    <div class="page-header text-center">
        <h3><strong>ENDEREÇOS CADASTRADOS E SETORIZADOS - SUVIS JAÇANÃ-TREMEMBÉ</strong></h3>
    </div>

    <div class="row espaco">
        <div class="text-center">
            <a href="formulario.php?link=15">
                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                    echo 'display: none;';
                } ?>" accesskey="N" data-toggle="tooltip" title="NOVO ENDEREÇO" class="btn btn-success"><span
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
            <th class="text-center">DA</th>
            <th class="text-center">SETOR</th>
            <th class="text-center">MAPA</th>
            <th class="text-center">LOG</th>
            <th class="text-center">ENDEREÇO</th>
            <th class="text-center">BAIRRO</th>
            <th class="text-center">CEP</th>
            <th class="text-center">P.GUIA</th>
            <th class="text-center">UBS</th>
            <th class="text-center">???</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row_rua_nomes = mysqli_fetch_assoc($resultado_rua_nomes)){ ?>
        <tr>
            <?php $id = $row_rua_nomes["id"]; ?>
            <td class="text-center"><?php echo utf8_encode($row_rua_nomes["id"]); ?></td>
            <td class="text-center">
                <a href='formulario.php?link=7&id=<?php echo $row_rua_nomes['id']; ?>'>
                    <button style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                        echo 'display: none;';
                    } ?>" type='button' data-toggle="tooltip" title="EDITAR ENDEREÇO" class='btn btn-warning'><span
                                class="glyphicon glyphicon-pencil"></button>
                </a>
            </td>
            <td class="text-center"><?php echo $row_rua_nomes["da"]; ?></td>
            <td class="text-center"><?php echo $row_rua_nomes["setor"]; ?></td>
            <td class="text-center">
                <a href='./setores/<?php echo $row_rua_nomes['setor']; ?>.pdf' alt="pdf"
                   pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" target="_blank">
                    <button type='button' data-toggle="tooltip" title="VISUALIZAR MAPA" class='btn btn-default'><span
                                class="glyphicon glyphicon-picture"></button>
                </a>
            </td>
            <td class="text-center"><?php echo $row_rua_nomes["log"]; ?></td>
            <td class="text-center"><?php echo $row_rua_nomes["rua"]; ?></td>
            <td class="text-center"><?php echo $row_rua_nomes["bairro"]; ?></td>
            <td class="text-center"><?php echo $row_rua_nomes["cep"]; ?></td>
            <td class="text-center"><?php echo $row_rua_nomes["pgguia"]; ?></td>
            <td class="text-center"><?php echo $row_rua_nomes["ubs"]; ?></td>
            <td class="text-center">
                <button type="button" class='btn btn-danger' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                    echo 'display: none;';
                } ?>" data-toggle="modal" data-target="#myModal<?php echo $row_rua_nomes['id']; ?>"><span
                            class="glyphicon glyphicon-trash"></span></button>
            </td>
        </tr>

        <!-- Inicio Modal Detalhes-->

        <div class="modal fade" id="myModal<?php echo $row_rua_nomes['id']; ?>" tabindex="-1" role="dialog"
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
                                <h4>Endereço: <?php echo $row_rua_nomes["rua"] ?> ? </h4>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="text-center">
                            <a href='formulario.php?link=59&id=<?php echo $row_rua_nomes['id']; ?>'>
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

<?php } ?>
</tbody>
</table>
</div>